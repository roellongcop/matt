<?php

namespace app\models;

use app\widgets\Anchor;
use app\helpers\Html;

/**
 * This is the model class for table "tbl_videos".
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string|null $description
 * @property string|null $photo
 * @property int $record_status
 * @property int $created_by
 * @property int $updated_by
 * @property string $created_at
 * @property string $updated_at
 */
class Video extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_videos';
    }

    public function config()
    {
        return [
            'controllerID' => 'video',
            'mainAttribute' => 'title',
            'paramName' => 'id',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return $this->setRules([
            [['title', 'url'], 'required'],
            [['description'], 'string'],
            [['title', 'url', 'photo'], 'string', 'max' => 255],
            [['url'], 'url'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return $this->setAttributeLabels([
            'id' => 'ID',
            'title' => 'Title',
            'url' => 'Url',
            'description' => 'Description',
            'photo' => 'Photo',
        ]);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\VideoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\VideoQuery(get_called_class());
    }
     
    public function gridColumns()
    {
        return [
            'photo' => ['attribute' => 'photo', 'format' => 'raw', 'value' => fn ($model) => $model->getPhotoPreview(50)],
            'title' => [
                'attribute' => 'title', 
                'format' => 'raw',
                'value' => function($model) {
                    return Anchor::widget([
                        'title' => $model->title,
                        'link' => $model->viewUrl,
                        'text' => true
                    ]);
                }
            ],
            'url' => ['attribute' => 'url', 'format' => 'link'],
            // 'description' => ['attribute' => 'description', 'format' => 'raw'],
        ];
    }

    public function getFile()
    {
        return File::findByToken($this->photo);
    }

    public function getPhotoPreview($w=300, $options=['class' => 'symbol img-fluid'])
    {
        if (($file = $this->file) === null) return;

        return Html::image($file, ['w' => $w], $options);
    }

    public function detailColumns()
    {
        return [
            'title:raw',
            'url:link',
            'description:raw',
            'photoPreview:raw',
        ];
    }

    public static function active($limit = 3)
    {
        return self::find()->active()->orderBy(['id' => SORT_DESC])->limit(3)->all();
    }
}