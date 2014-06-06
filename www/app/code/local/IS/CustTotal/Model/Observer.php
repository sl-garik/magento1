<?php

class IS_CustTotal_Model_Observer
{
    public function handle_adminSystemConfigChangedSection($observer)
    {
        $file = Mage::getStoreConfig('mycustom_section/mycustom_group/file');
        $dir = Mage::getBaseDir('var') . DS . 'uploads';
        if (!empty($file)) {
            $csv = new Varien_File_Csv();
            $data = $csv->getData($dir . DS . $file);
            for ($i = 1; $i < count($data); $i++) {
                if (!empty($data[$i][0]) || !empty($data[$i][1])) {
                    if ($i > 0) {
                        $bd_table = Mage::getModel('custtotal/custtotal');
                        $bd_table->setData('ZipCode', $data[$i][0]);
                        $bd_table->setData('NewPrice', $data[$i][1]);
                        $bd_table->save();
                    }
                }
            }
            Mage::getSingleton('adminhtml/session')->addSuccess('Message: Table is saving!');
        }
    }
}