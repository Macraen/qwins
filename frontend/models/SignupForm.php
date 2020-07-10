<?php
namespace frontend\models;

use GuzzleHttp\Psr7\Uri;
use yii\helpers\Url;
use yii\base\Model;
use common\models\User;
use Yii;


/**
 * Signup form
 */
class SignupForm extends Model
{
    const STATUS_ACT_EMAIL = 2;

    public $surname;
    public $name;
    public $patronymic;
    public $phone_number;
    public $email;
    public $country;
    public $city;
    public $password;
    public $conf_pass;
    public $code_email_conf;
    public $active;
    public $status;
    /*public $username;
    public $email;
    public $password;*/


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['surname', 'trim'],
            ['surname', 'required', 'message' => "Це поле обов'язкове."],
            ['surname', 'string', 'min' =>2, 'max' => 255],

            ['name', 'trim'],
            ['name', 'required', 'message' => "Це поле обов'язкове."],
            ['name', 'string', 'min' =>2, 'max' => 255],

            ['patronymic', 'trim'],
            ['patronymic', 'required', 'message' => "Це поле обов'язкове."],
            ['patronymic', 'string', 'min' =>2, 'max' => 255],

            ['phone_number', 'trim'],
            ['phone_number', 'required', 'message' => "Це поле обов'язкове."],
            ['phone_number', 'string', 'max' => 12],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email', 'message' => "Введіть коректну адресу."],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['country', 'trim'],
            ['country', 'required'],
            ['country', 'string', 'max' => 12],

            ['city', 'trim'],
            ['city', 'required'],
            ['city', 'string', 'min' => 2],

            ['password', 'required', 'message' => "Це поле обов'язкове."],
            ['password', 'string', 'min' => 6, 'max' => 20, 'message' => "Пароль повинен містити не менше 6-ти символів."],

            ['conf_pass', 'compare', 'compareAttribute' => 'password', 'message' => "Паролі не збігаються."],



        ];
    }

    public function sendConfirmationLink() {
        $confirmationLinkUrl = Url::to(['/site/confirmemail', 'email'=>$this->email, 'code_email_conf'=>$this->code_email_conf],'https');

        $sendingResult = Yii::$app->mailer->compose()
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setTo($this->email)
            ->setSubject('Будь ласка підтвердіть Вашу електронну пошту в Qwins.')
            ->setHtmlBody('<table bgcolor="#000000" align="center" cellpadding="1" cellspacing="1" width="600" style="border-collapse:collapse;border-spacing:0px;background-color:#ffffff">
             <tbody><tr style="border-collapse:collapse"> 
              <td style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:40px;padding-right:40px;background-position:center bottom" align="left"> 
               <table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border-spacing:0px"> 
                 <tbody><tr style="border-collapse:collapse"> 
                  <td width="520" valign="top" align="center" style="padding:0;Margin:0"> 
                   <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="border-collapse:collapse;border-spacing:0px"> 
                     <tbody>
                     <tr style="border-collapse:collapse"> 
                      <td align="center" style="padding:0;Margin:0;padding-top:15px;padding-bottom:20px"><h3 style="Margin:0;line-height:24px;font-family:arial,helvetica,sans-serif;font-size:20px;font-style:normal;font-weight:normal;color:#010101">Підтвердіть Вашу електронну пошту, щоб завершити реєстрацію в Qwins. Натисніть на кнопку знизу</h3></td> 
                     </tr> 
                     <tr style="border-collapse:collapse"> 
                       <td align="center" style="padding:10px;Margin:0"><span class="es-button-border es-button-border-2" style="border-style:solid;border-color:#2CB543;background:#6EC658;border-width:0px;display:inline-block;border-radius:3px;width:auto"><a href="'.$confirmationLinkUrl.'" class="es-button es-button-1" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, \'helvetica neue\', helvetica, arial, sans-serif;font-size:18px;color:#FFFFFF;border-style:solid;border-color:#6EC658;border-width:10px 20px 10px 20px;display:inline-block;background:#6EC658;border-radius:3px;font-weight:normal;font-style:normal;line-height:22px;width:auto;text-align:center">Підтвердити</a></span></td>
                      </tr> 
                   </tbody></table></td> 
                 </tr> 
               </tbody></table></td> 
             </tr> 
           </tbody></table>')
            ->send();
        return $sendingResult;
    }


    /**
     * Signs user up.
     *
     * @return bool
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

            $user = new User();
            $user->surname = $this->surname;
            $user->name = $this->name;
            $user->patronymic = $this->patronymic;
            $user->phone_number = $this->phone_number;
            $user->email = $this->email;
            $user->country = $this->country;
            $user->city = $this->city;
            $user->setPassword($this->password);
            $user->code_email_conf = $this->code_email_conf;
            $user->status = $this->status;
            //$user->generateAuthKey();
            return $user->save();

    }
}
