<?php

/**
 * This is the model class for table "product_register".
 *
 * The followings are the available columns in table 'product_register':
 * @property integer $id
 * @property integer $product_id
 * @property string $registrant
 * @property integer $gender
 * @property string $passport
 * @property integer $passport_type
 * @property string $email
 * @property integer $sz_account
 * @property integer $insured
 * @property integer $property_count
 * @property string $requirement
 * @property string $address
 * @property string $work_address
 * @property string $createtime
 */
class ProductRegister extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ProductRegister the static model class
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
		return 'product_register';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, phone, registrant, insured', 'required'),
			array('product_id, gender, passport_type, sz_account, insured, property_count', 'numerical', 'integerOnly'=>true),
			array('registrant', 'length', 'max'=>20),
			array('passport, phone, email', 'length', 'max'=>50),
			array('email', 'email'),
			array('requirement, address, message, work_address', 'length', 'max'=>255),
			array('createtime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, createtime, registrant, gender, passport, passport_type, email, sz_account, insured, property_count, requirement, address, work_address', 'safe', 'on'=>'search'),
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
	public function attributeLabels(){
		return array(
			'id' => 'ID',
			'product_id' => '登记项目',
			'registrant' => '姓 名',
			'gender' => '性 别',
			'passport' => '证件号码',
			'passport_type' => '证件类型',
			'phone' => '联系电话',
			'email' => '电子邮箱',
			'sz_account' => '是否深户',
			'insured' => '方式',
			'property_count' => '置业次数',
			'requirement' => '购房需求',
			'address' => '住址',
			'work_address' => '工作地址',
			'message' => '客户需求',
			'createtime' => '登记时间',
		);
	}
	
	public static function getInsuredOptions(){
	    return array('购铺', '租铺');
	}
	
	public static function getGenderOptions(){
	    return array('男', '女');
	}
	
	public static function getPassportTypeOptions(){
	    return array('身份证', '香港身份证', '大陆来往证', '军官证', '护照', '台胞证', '其它');
	}
	
	public static function getPropertyCountOptions(){
	    return array('0次', '1次', '2次', '2次以上');
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
		$criteria->compare('registrant',$this->registrant,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('passport',$this->passport,true);
		$criteria->compare('passport_type',$this->passport_type);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('sz_account',$this->sz_account);
		$criteria->compare('insured',$this->insured);
		$criteria->compare('property_count',$this->property_count);
		$criteria->compare('requirement',$this->requirement,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('work_address',$this->work_address,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function beforeSave(){
	    if ($this->getIsNewRecord()){
	        $this->createtime = new CDbExpression('NOW()');
	    }
	    return parent::beforeSave();
	}
}