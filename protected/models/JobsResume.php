<?php

/**
 * This is the model class for table "jobs_resume".
 *
 * The followings are the available columns in table 'jobs_resume':
 * @property integer $id
 * @property integer $job_id
 * @property string $applicant
 * @property integer $gender
 * @property string $birthday
 * @property string $native
 * @property string $tall
 * @property integer $landscape
 * @property integer $wedding
 * @property integer $cer_type
 * @property string $cer_num
 * @property integer $working_age
 * @property integer $education
 * @property string $school
 * @property string $professional
 * @property string $hope_wage
 * @property string $p_company
 * @property string $p_post
 * @property string $p_wage
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $work_ex
 * @property string $edu_ex
 * @property string $createtime
 */
class JobsResume extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return JobsResume the static model class
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
		return '{{jobs_resume}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('job_id, applicant, gender, phone, work_ex', 'required'),
			array('job_id, gender', 'numerical', 'integerOnly'=>true),
			array('applicant', 'length', 'max'=>50),
			array('address', 'length', 'max'=>100),
			array('phone', 'length', 'max'=>255),
			array('email', 'email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, job_id, createtime, applicant, gender, birthday, native, tall, landscape, wedding, cer_type, cer_num, working_age, education, school, professional, hope_wage, p_company, p_post, p_wage, address, email, phone, work_ex, edu_ex', 'safe'),
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
			'post' => array(self::BELONGS_TO, 'jobs', 'job_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '简历id',
			'job_id' => '应聘职位',
			'applicant' => '姓名',
			'gender' => '性别',
			'birthday' => '出生年月',
			'native' => '民族',
			'tall' => '身高',
			'landscape' => '政治面貌',
			'wedding' => '婚否',
			'cer_type' => '证件类型',
			'cer_num' => '证件号码',
			'working_age' => '工作年限',
			'education' => '最高学历',
			'school' => '毕业学校',
			'professional' => '专业',
			'hope_wage' => '期望薪资',
			'p_company' => '目前工作单位',
			'p_post' => '职务',
			'p_wage' => '目前薪资',
			'address' => '现住地址',
			'email' => 'E-mail',
			'phone' => '联系电话',
			//'work_ex' => '工作经历（时间、单位、职位、内容）',
			'work_ex' => '简介',
			'edu_ex' => '教育培训经历（请写出具体培训课程和获得证书名称和级别）',
		    'createtime' => '应聘时间',
		);
	}
	
	public static function getGenderOptions(){
	    return array('男', '女');
	}
	
	public static function getCerTypeOptions(){
	    return array('身份证', '其它');
	}
	
	public static function getWorkingAgeOptions(){
	    return array('1-3年', '3-5年', '5年以上');
	}
	
	public static function getEducationOptions(){
	    return array('博士', '硕士', '本科', '大专', '大专以下');
	}
	
	public static function getWeddingOptions(){
	    return array('已婚', '未婚', '离婚', '丧偶');
	}
	public static function getLandscapeOptions(){
	    return array('党员', '团员', '群众');
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
		$criteria->compare('job_id',$this->job_id);
		$criteria->compare('applicant',$this->applicant,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('native',$this->native,true);
		$criteria->compare('tall',$this->tall,true);
		$criteria->compare('landscape',$this->landscape);
		$criteria->compare('wedding',$this->wedding);
		$criteria->compare('cer_type',$this->cer_type);
		$criteria->compare('cer_num',$this->cer_num,true);
		$criteria->compare('working_age',$this->working_age);
		$criteria->compare('education',$this->education);
		$criteria->compare('school',$this->school,true);
		$criteria->compare('professional',$this->professional,true);
		$criteria->compare('hope_wage',$this->hope_wage,true);
		$criteria->compare('p_company',$this->p_company,true);
		$criteria->compare('p_post',$this->p_post,true);
		$criteria->compare('p_wage',$this->p_wage,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('work_ex',$this->work_ex,true);
		$criteria->compare('edu_ex',$this->edu_ex,true);

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