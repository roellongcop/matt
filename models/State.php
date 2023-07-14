<?php

namespace app\models;

use app\widgets\Anchor;

/**
 * This is the model class for table "tbl_states".
 *
 * @property int $id
 * @property string $name
 * @property int $country_id
 * @property string $country_code
 * @property string|null $fips_code
 * @property string|null $iso2
 * @property string|null $type
 * @property float|null $latitude
 * @property float|null $longitude
 * @property string|null $created_at
 * @property string $updated_at
 * @property int $flag
 * @property string|null $wikiDataId Rapid API GeoDB Cities
 *
 * @property Country $country
 */
class State extends ActiveRecord
{
    const ROMBLON = 1269;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_states';
    }

    public function config()
    {
        return [
            'controllerID' => 'state',
            'mainAttribute' => 'id',
            'paramName' => 'id',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return $this->setRules([
            [['name', 'country_id', 'country_code'], 'required'],
            [['country_id', 'flag'], 'integer'],
            [['latitude', 'longitude'], 'number'],
            [['name', 'fips_code', 'iso2', 'wikiDataId'], 'string', 'max' => 255],
            [['country_code'], 'string', 'max' => 2],
            [['type'], 'string', 'max' => 191],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return $this->setAttributeLabels([
            'id' => 'ID',
            'name' => 'Name',
            'country_id' => 'Country ID',
            'country_code' => 'Country Code',
            'fips_code' => 'Fips Code',
            'iso2' => 'Iso2',
            'type' => 'Type',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'flag' => 'Flag',
            'wikiDataId' => 'Wiki Data ID',
        ]);
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CountryQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\StateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\StateQuery(get_called_class());
    }
     
    public function gridColumns()
    {
        return [
            'name' => [
                'attribute' => 'name', 
                'format' => 'raw',
                'value' => function($model) {
                    return Anchor::widget([
                        'title' => $model->name,
                        'link' => $model->viewUrl,
                        'text' => true
                    ]);
                }
            ],
            'country_id' => ['attribute' => 'country_id', 'format' => 'raw'],
            'country_code' => ['attribute' => 'country_code', 'format' => 'raw'],
            'fips_code' => ['attribute' => 'fips_code', 'format' => 'raw'],
            'iso2' => ['attribute' => 'iso2', 'format' => 'raw'],
            'type' => ['attribute' => 'type', 'format' => 'raw'],
            'latitude' => ['attribute' => 'latitude', 'format' => 'raw'],
            'longitude' => ['attribute' => 'longitude', 'format' => 'raw'],
            'flag' => ['attribute' => 'flag', 'format' => 'raw'],
            'wikiDataId' => ['attribute' => 'wikiDataId', 'format' => 'raw'],
        ];
    }

    public function detailColumns()
    {
        return [
            'name:raw',
            'country_id:raw',
            'country_code:raw',
            'fips_code:raw',
            'iso2:raw',
            'type:raw',
            'latitude:raw',
            'longitude:raw',
            'flag:raw',
            'wikiDataId:raw',
        ];
    }
}