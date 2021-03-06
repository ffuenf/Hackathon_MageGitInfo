<?php
/**
 * This file is part of the MAGEGITINFO project.
 *
 * Hackathon MageGitInfo is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License version 3 as
 * published by the Free Software Foundation.
 *
 * This script is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * PHP version 5
 *
 * @category  MageGitInfo
 * @package   Hackathon_MageGitInfo
 * @author    Tom Kadwill <tomkadwill@gmail.com>
 * @author    Stephan Hoyer <ste.hoyer@gmail.com>
 * @author    André Herrn <info@andre-herrn.de>
 * @author    Anjey Lobas <anjey.lobas@goodahead.com>
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @version   $Id:$
 * @since     0.1.0
 */
/**
 * Log Block
 *
 * @category  MageGitInfo
 * @package   Hackathon_MageGitInfo
 * @author    Tom Kadwill <tomkadwill@gmail.com>
 * @author    Stephan Hoyer <ste.hoyer@gmail.com>
 * @author    André Herrn <info@andre-herrn.de>
 * @author    Anjey Lobas <anjey.lobas@goodahead.com>
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @version   $Id:$
 * @since     0.1.0
 */
class Hackathon_MageGitInfo_Block_Adminhtml_Git_Log extends Hackathon_MageGitInfo_Block_Adminhtml_Git_Abstract
{
    /**
     * @var Hackathon_MageGitInfo_Model_Log
     */
    protected $log;

    /**
     * Constructor
     */
    protected function _construct()
    {
        $this->log = Mage::getModel("magegitinfo/log")->log(
            Mage::getStoreConfig('magegitinfo/params/number_of_logs')
        );
    }

    public function getLogEntries() {
        $helper = Mage::helper("magegitinfo/data");
        try {
            return $this->log->getLogEntries();
        } catch (Hackathon_MageGitInfo_Model_Git_Exception $e) {
            $helper->log(
                $helper->__("Error to retrieve log entries with message '%s'", $e->getMessage())
            );
        }
    }
}