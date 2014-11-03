<?php

Yii::import('application.models._base.BaseBeneficiary');

class Beneficiary extends BaseBeneficiary {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function getVendor($distribution_id) {
        $distribution = Distribution::model()->findByPk($distribution_id);
        if (!$distribution)
            return 0;
        $criteria = "(0";
        foreach ($distribution->subdistributions as $subdistribution) {
            foreach ($subdistribution->distributionVouchers as $distributionVoucher) {
                $criteria .=  "," . $distributionVoucher->id ;
            }
        }
        $criteria .= ")";
        $voucher = Voucher::model()->find("ben_id = " . $this->id . " and distribution_voucher_id in " . $criteria);
        if ($voucher->vendor_id == null) 
            return 0;
        return $voucher->vendor_id;
    }

    public function searchForVoucherAssignment() {
        $criteria = new CDbCriteria;
        $include = "not in";
        if (isset($_GET['include']) and $_GET['include'] != 0) {
            $include = "in";
        }
        if (isset($_GET['distribution_id']) and $_GET['distribution_id'] != 0) {
            $criteria->condition = "id " . $include . " (select distinct ben_id from voucher where distribution_voucher_id in (Select id from distribution_voucher where subdistribution_id in (SELECT id FROM `subdistribution` WHERE distribution_id = " . $_GET['distribution_id'] . ")))";
        }

        $criteria->compare('id', $this->id, true);
        $criteria->compare('registration_code', $this->registration_code, true);
        $criteria->compare('status_id', $this->status_id);
        //$criteria->compare('family', $this->family);
        $criteria->compare('deleted_at', $this->deleted_at, true);
        $criteria->compare('remote_image', $this->remote_image, true);
        $criteria->compare('ar_name', $this->ar_name, true);
        $criteria->compare('father_name', $this->father_name, true);
        $criteria->compare('mother_name', $this->mother_name, true);
        $criteria->compare('birth_year', $this->birth_year);
        $criteria->compare('gender', $this->gender);
        $criteria->compare('nationality_id', $this->nationality_id);
        $criteria->compare('family_member', $this->family_member, true);
        $criteria->compare('combine_household', $this->combine_household, true);
        $criteria->compare('main_income_source', $this->main_income_source, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 10,
            ),
        ));
    }

}
