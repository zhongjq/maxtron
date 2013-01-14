<?php

/**
 * This is the model class for table "download".
 *
 * The followings are the available columns in table 'download':
 * @property integer $id
 * @property integer $cate_id
 * @property string $url
 * @property string $title
 * @property string $issuer
 * @property string $issue_date
 * @property integer $sort
 * @property string $icon
 * @property string $download
 */
class Download extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Download the static model class
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
		return '{{download}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cate_id, url, title, issuer, issue_date, icon, download', 'required'),
			array('cate_id, sort', 'numerical', 'integerOnly'=>true),
			array('url, title, icon, download', 'length', 'max'=>255),
			array('issuer', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cate_id, url, title, issuer, issue_date, sort, icon, download', 'safe', 'on'=>'search'),
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
			'cate'=>array(self::BELONGS_TO, 'tree', 'cate_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cate_id' => '分类',
			'url' => '在线预览地址',
			'title' => '标题',
			'issuer' => '主办',
			'issue_date' => '发布时间',
			'sort' => '排序',
			'icon' => '图片',
			'download' => '下载地址',
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
		$criteria->compare('cate_id',$this->cate_id);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('issuer',$this->issuer,true);
		$criteria->compare('issue_date',$this->issue_date,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('icon',$this->icon,true);
		$criteria->compare('download',$this->download,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}