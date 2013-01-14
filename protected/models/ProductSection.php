<?php

/**
 * This is the model class for table "product_section".
 *
 * The followings are the available columns in table 'product_section':
 * @property integer $id
 * @property integer $product_id
 * @property string $name
 * @property string $summary
 * @property string $thumb
 * @property string $picture
 * @property string $issue_date
 */
class ProductSection extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ProductSection the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{product_section}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, name', 'required'),
			array('product_id', 'numerical', 'integerOnly'=>true),
			array('name, summary, thumb, picture', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, name, summary, thumb, picture, issue_date', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		    'product'=>array(self::BELONGS_TO, 'product', 'product_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '工期id',
			'product_id' => '所属项目',
			'name' => '工期名称',
			'summary' => '摘要',
			'thumb' => '缩略图',
			'picture' => '效果图',
			'issue_date' => '发布时间',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('thumb',$this->thumb,true);
		$criteria->compare('picture',$this->picture,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}