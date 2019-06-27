<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * Signup form
 */
class CreateUserForm extends Model
{
    public $first_name;
    public $last_name;
    public $username;
    public $email;
    public $password;
    public $status;
    public $user_type_id;
    public $department_id;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            
            ['first_name', 'required'],
            ['first_name', 'string', 'min' => 2, 'max' => 255],
            
            ['last_name', 'required'],
            ['last_name', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['status', 'in', 'range' => [User::STATUS_ACTIVE, User::STATUS_INACTIVE, User::STATUS_DELETED]],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['user_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserType::className(), 'targetAttribute' => ['user_type_id' => 'id']],
        ];
    }

    /**
     * Create User
     *
     * @return bool whether the creating new account was successful
     */
    public function create()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User(['scenario' => 'create']);
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->user_type_id = $this->user_type_id;
        $user->department_id = $this->department_id;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        // Check if email based registration is true
        if(Yii::$app->params['rwe']) {
            $user->generateEmailVerificationToken();
            if($user->save() && $this->sendEmail($user)){
                return $user;
            }
        } else {
            $user->status = $user::STATUS_ACTIVE;
            if($user->save()) {
                return $user;
            }
        }

    }

    /**
     * Update user
     *
     * @return bool whether the creating new account was successful
     */
    public function update($id)
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = User::findOne($id);
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->user_type_id = $this->user_type_id;
        $user->department_id = $this->department_id;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        // Check if email based registration is true
        if(Yii::$app->params['rwe']) {
            $user->generateEmailVerificationToken();
            if($user->save() && $this->sendEmail($user)){
                return $user;
            }
        } else {
            $user->status = $user::STATUS_ACTIVE;
            if($user->save()) {
                return $user;
            }
        }

    }

    public function getUser($id)
    {
        $user = User::findOne($id);
        $this->load($user);
    }
    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
