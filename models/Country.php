<?php

namespace app\models;

use app\widgets\Anchor;

/**
 * This is the model class for table "tbl_countries".
 *
 * @property int $id
 * @property string $name
 * @property string|null $iso3
 * @property string|null $numeric_code
 * @property string|null $iso2
 * @property string|null $phonecode
 * @property string|null $capital
 * @property string|null $currency
 * @property string|null $currency_name
 * @property string|null $currency_symbol
 * @property string|null $tld
 * @property string|null $native
 * @property string|null $region
 * @property string|null $subregion
 * @property string|null $timezones
 * @property string|null $translations
 * @property float|null $latitude
 * @property float|null $longitude
 * @property string|null $emoji
 * @property string|null $emojiU
 * @property string|null $created_at
 * @property string $updated_at
 * @property int $flag
 * @property string|null $wikiDataId Rapid API GeoDB Cities
 *
 * @property State[] $states
 */
class Country extends ActiveRecord
{
    const PH = 174;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_countries';
    }

    public function config()
    {
        return [
            'controllerID' => 'country',
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
            [['name'], 'required'],
            [['timezones', 'translations'], 'string'],
            [['latitude', 'longitude'], 'number'],
            [['flag'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['iso3', 'numeric_code'], 'string', 'max' => 3],
            [['iso2'], 'string', 'max' => 2],
            [['phonecode', 'capital', 'currency', 'currency_name', 'currency_symbol', 'tld', 'native', 'region', 'subregion', 'wikiDataId'], 'string', 'max' => 255],
            [['emoji', 'emojiU'], 'string', 'max' => 191],
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
            'iso3' => 'Iso3',
            'numeric_code' => 'Numeric Code',
            'iso2' => 'Iso2',
            'phonecode' => 'Phonecode',
            'capital' => 'Capital',
            'currency' => 'Currency',
            'currency_name' => 'Currency Name',
            'currency_symbol' => 'Currency Symbol',
            'tld' => 'Tld',
            'native' => 'Native',
            'region' => 'Region',
            'subregion' => 'Subregion',
            'timezones' => 'Timezones',
            'translations' => 'Translations',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'emoji' => 'Emoji',
            'emojiU' => 'Emoji U',
            'flag' => 'Flag',
            'wikiDataId' => 'Wiki Data ID',
        ]);
    }

    /**
     * Gets query for [[States]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\StateQuery
     */
    public function getStates()
    {
        return $this->hasMany(State::className(), ['country_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\CountryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\CountryQuery(get_called_class());
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
            'iso3' => ['attribute' => 'iso3', 'format' => 'raw'],
            'numeric_code' => ['attribute' => 'numeric_code', 'format' => 'raw'],
            'iso2' => ['attribute' => 'iso2', 'format' => 'raw'],
            'phonecode' => ['attribute' => 'phonecode', 'format' => 'raw'],
            'capital' => ['attribute' => 'capital', 'format' => 'raw'],
            'currency' => ['attribute' => 'currency', 'format' => 'raw'],
            'currency_name' => ['attribute' => 'currency_name', 'format' => 'raw'],
            'currency_symbol' => ['attribute' => 'currency_symbol', 'format' => 'raw'],
            'tld' => ['attribute' => 'tld', 'format' => 'raw'],
            'native' => ['attribute' => 'native', 'format' => 'raw'],
            'region' => ['attribute' => 'region', 'format' => 'raw'],
            'subregion' => ['attribute' => 'subregion', 'format' => 'raw'],
            'timezones' => ['attribute' => 'timezones', 'format' => 'raw'],
            'translations' => ['attribute' => 'translations', 'format' => 'raw'],
            'latitude' => ['attribute' => 'latitude', 'format' => 'raw'],
            'longitude' => ['attribute' => 'longitude', 'format' => 'raw'],
            'emoji' => ['attribute' => 'emoji', 'format' => 'raw'],
            'emojiU' => ['attribute' => 'emojiU', 'format' => 'raw'],
            'flag' => ['attribute' => 'flag', 'format' => 'raw'],
            'wikiDataId' => ['attribute' => 'wikiDataId', 'format' => 'raw'],
        ];
    }

    public function detailColumns()
    {
        return [
            'name:raw',
            'iso3:raw',
            'numeric_code:raw',
            'iso2:raw',
            'phonecode:raw',
            'capital:raw',
            'currency:raw',
            'currency_name:raw',
            'currency_symbol:raw',
            'tld:raw',
            'native:raw',
            'region:raw',
            'subregion:raw',
            'timezones:raw',
            'translations:raw',
            'latitude:raw',
            'longitude:raw',
            'emoji:raw',
            'emojiU:raw',
            'flag:raw',
            'wikiDataId:raw',
        ];
    }
}