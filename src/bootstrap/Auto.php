<?php
/**
 */

namespace execut\books\bootstrap;


use execut\books\models\Book;
use yii\base\BootstrapInterface;
use yii\console\Application;
use yii\db\ActiveRecord;

class Auto implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $bootstraps = [];
        if ($app instanceof Application) {
            $bootstraps[] = new Console();
        } else if ($app instanceof \yii\web\Application) {
            if ($app->id === 'app-backend') {
                $bootstraps[] = new Backend();
            } else {
                $bootstraps[] = new Common();
            }
        }

        foreach ($bootstraps as $bootstrap) {
            $bootstrap->bootstrap($app);
        }
    }
}