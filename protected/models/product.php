<?php
/**
 * This is the model class for table "product".
 *
 * @property ProductImage[] $images
 * @property ProductImage[] $newspapers
 * @property ProductSection[] $section
 * @property $sectionCount
 */
class product extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'product':
	 * @var integer $id
	 * @var integer $cate_id
	 * @var string $icon
	 * @var string $title
	 * @var string $summary
	 * @var string $phone
	 * @var string $content
	 * @var string $issue_message
	 * @var integer $createtime
	 * @var integer $updatetime
	 * @var integer $top
	 * @var integer $digest
	 * @var integer $state
	 * @var integer $sort
	 * @var string $date
	 * @var integer $hit
	 * @var string $ebook_picture
	 * @var string $ebook_picture
	 * @var string $ebook_picture

	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
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
		return '{{product}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cate_id, title, content', 'required'),
			array('cate_id, createtime, updatetime, top, digest, state, sort, hit', 'numerical', 'integerOnly'=>true),
			array('icon, title, summary', 'length', 'max'=>255),
			array('phone', 'length', 'max'=>50),
			array('number, weight, date, sellout, ebook_name, ebook_url, ebook_picture, ebook_download, issue_message', 'safe'),
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
			'newspapers'=>array(self::HAS_MANY, 'ProductImage', 'product_id', 'condition' => 'newspapers.type=1'),
			'images'=>array(self::HAS_MANY, 'ProductImage', 'product_id', 'condition' => 'images.type=2'),
		    'sections'=>array(self::HAS_MANY, 'ProductSection', 'product_id', 'order' => 'sections.issue_date desc'),
		    'sectionCount'=>array(self::STAT, 'ProductSection', 'product_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'cate_id' => '分类',
			'icon' => '图片',
			'title' => '名称',
			'summary' => '概要',
			'phone' => '电话',
			'content' => '介绍',
			'issue_message' => '工期发布',
			'createtime' => '创建时间',
			'updatetime' => '修改时间',
			'top' => '首页滚动',
			'digest' => '特色产品',
			'state' => '显示',
			'sellout' => '售罄',
			'sort' => '排序',
			'date' => '日期',
			'hit' => '点击',
			'number' => '产品编号',
			'weight' => '重量',
			'ebook_picture' => '缩略图',
			'ebook_name' => '名称',
			'ebook_download' => '下载地址',
		    'ebook_url' => '在线预览',
		);
	}

	public function beforeSave() {
		if($this->isNewRecord){
			$this->createtime = strtotime(NOW);
		}
		$this->updatetime = strtotime(NOW);
		return true;
	}
	
	/**
	 * @param ProductImage $model
	 * @return boolean whether the add succeeds
	 */
	public function addImage($model){
	    $model->product_id = $this->id;
	    return $model->save();
	}
	
	/**
	 * @param ProductImage $model
	 * @return boolean whether the add succeeds
	 */
	public function addSection($model){
	    $model->product_id = $this->id;
	    return $model->save();
	}
}
