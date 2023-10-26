<?php

namespace app\controllers;

use app\helpers\App;
use app\helpers\Html;
use app\models\State;
use app\models\User;
use app\models\form\ContactForm;
use app\models\form\LoginForm;
use app\models\form\PasswordResetForm;
use app\models\form\SetNewPasswordForm;
use app\models\form\SignUpForm;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['AccessControl'] = [
            'class' => 'app\filters\AccessControl',
            'publicActions' => [
                'index',
                'login',
                'reset-password',
                'contact',
                'signup',
                'states',
                'email-verification',
                'signup-success',
                'resend-email-verification',
                'set-new-password',
                'api-login'
            ]
        ];
        $behaviors['VerbFilter'] = [
            'class' => 'app\filters\VerbFilter',
            'verbActions' => [
                'logout' => ['post'],
            ]
        ];

        if ($this->action->id === 'index') {
            unset($behaviors['ThemeFilter']);
        }

        return $behaviors;
    }

    public function beforeAction($action)
    {
        switch ($action->id) {
            case 'index':
                $this->layout = 'frontend';
                break;

            case 'signup':
            case 'login':
            case 'set-new-password':
            case 'signup-success':
            case 'reset-password':
            case 'contact':
                $this->layout = 'login';
                break;

            default:
                # code...
                break;
        }
        return parent::beforeAction($action);
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'layout' => 'error'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionApiLogin($auth_key = '')
    {
        if (($user = User::findOne(['auth_key' => $auth_key])) != null) {
            $user->generateAuthKey();
            $user->save();
            
            App::loginUser($user, 0);

            return $this->redirect(['dashboard/index']);
        }

        throw new NotFoundHttpException('User not found.');
    }

    public function actionResetPassword()
    {
        $model = new PasswordResetForm();
        if ($model->load(App::post())) {
            if (($user = $model->process()) != null) {
                if ($model->hint) {
                    App::success("Your password hint is: '{$user->password_hint}'.");
                } else {
                    App::success("Email sent.");
                }
            } else {
                App::danger($model->errors);
            }
        }

        return $this->redirect(['login']);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!App::isGuest()) {
            return $this->redirect(['dashboard/index']);
        }

        $model = new LoginForm();

        if ($model->load(App::post()) && $model->login()) {
            return $this->redirect(['dashboard/index']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
            'PSR' => new PasswordResetForm(),
        ]);
    }

    public function actionSignupSuccess($vt)
    {
        if (($user = User::findOne(['verification_token' => $vt])) != null) {

            return $this->render('signup-success', [
                'user' => $user
            ]);
        }

        throw new NotFoundHttpException('User not found.');
    }

    public function actionSignup()
    {
        if (!App::isGuest()) {
            return $this->goHome();
        }

        $model = new SignUpForm();

        if ($model->load(App::post()) && ($user = $model->signup()) != null) {
            return $this->redirect(['signup-success', 'vt' => $user->verification_token]);
        }

        return $this->render('signup', [
            'model' => $model
        ]);
    }


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        App::logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(App::post()) && $model->contact()) {
            App::success('Thank you for contacting us. We will respond to you as soon as possible.');
            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionStates($country_id)
    {
        $states = State::dropdown('id', 'name', ['country_id' => $country_id]);

        $options = App::foreach($states, fn ($name, $id) => Html::tag('option', $name, [
            'value' => $id
        ]));

        return $this->asJson([
            'status' => 'success',
            'state_options' => implode('', [
                Html::tag('option', 'Select State', ['value' => '']),
                $options
            ])
        ]);
    }

    public function actionEmailVerification($vt='')
    {
        if (($user = User::findOne(['verification_token' => $vt])) != null) {
              
            if ($user->isNotVerified) {
                $user->status = User::STATUS_ACTIVE;
                if ($user->save()) {
                    App::loginUser($user, 0);
                    App::success('User Successfully Verified!');
                    return $this->redirect(['dashboard/index']);
                }
                else {
                    App::danger(App::danger($user->errorSummary));
                }

                return $this->redirect(['login']);
            }


            if ($user->isInactive) {
                App::danger('User is inactive');
            }


            if ($user->isBlocked) {
                App::danger('User is blocked');
            }

            if ($user->role->isInactive) {
                App::danger('Role is inactive');
            }

            return $this->redirect(['login']);
        }


        throw new NotFoundHttpException('User not found.');
    }

    public function actionResendEmailVerification($vt='')
    {
        if (($user = User::findOne(['verification_token' => $vt])) != null) {

            $email = (new SignUpForm())->sendEmail($user);

            if ($email) {
                App::success('Email Resent!');
            }
            else {
                App::warning('Something went wrong when sending email.');
            }

            return $this->redirect(['signup-success', 'vt' => $user->verification_token]);
        
        }

        throw new NotFoundHttpException('User not found.');
    }

    public function actionSetNewPassword($prt='')
    {
        if (($user = User::findOne(['password_reset_token' => $prt])) != null) {
            $model = new SetNewPasswordForm(['prt' => $user->password_reset_token]);

            if ($model->load(App::post())) {

                if ($model->setNewPassword()) {
                    App::success('Password changed successfully!');
                    return $this->redirect(['login']);
                }
                else {
                    App::danger($model->errors);
                }

            }
            
            return $this->render('set-new-password', [
                'model' => $model,
            ]);

        }
        throw new NotFoundHttpException('User not found.');
    }
}