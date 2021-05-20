<?php
/**
 * Autogenerated by Thrift Compiler (0.13.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class TRowSet
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'startRowOffset',
            'isRequired' => true,
            'type' => TType::I64,
        ),
        2 => array(
            'var' => 'rows',
            'isRequired' => true,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\TRow',
                ),
        ),
        3 => array(
            'var' => 'columns',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\TColumn',
                ),
        ),
        4 => array(
            'var' => 'binaryColumns',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        5 => array(
            'var' => 'columnCount',
            'isRequired' => false,
            'type' => TType::I32,
        ),
    );

    /**
     * @var int
     */
    public $startRowOffset = null;
    /**
     * @var \TRow[]
     */
    public $rows = null;
    /**
     * @var \TColumn[]
     */
    public $columns = null;
    /**
     * @var string
     */
    public $binaryColumns = null;
    /**
     * @var int
     */
    public $columnCount = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['startRowOffset'])) {
                $this->startRowOffset = $vals['startRowOffset'];
            }
            if (isset($vals['rows'])) {
                $this->rows = $vals['rows'];
            }
            if (isset($vals['columns'])) {
                $this->columns = $vals['columns'];
            }
            if (isset($vals['binaryColumns'])) {
                $this->binaryColumns = $vals['binaryColumns'];
            }
            if (isset($vals['columnCount'])) {
                $this->columnCount = $vals['columnCount'];
            }
        }
    }

    public function getName()
    {
        return 'TRowSet';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->startRowOffset);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::LST) {
                        $this->rows = array();
                        $_size104 = 0;
                        $_etype107 = 0;
                        $xfer += $input->readListBegin($_etype107, $_size104);
                        for ($_i108 = 0; $_i108 < $_size104; ++$_i108) {
                            $elem109 = null;
                            $elem109 = new \TRow();
                            $xfer += $elem109->read($input);
                            $this->rows []= $elem109;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::LST) {
                        $this->columns = array();
                        $_size110 = 0;
                        $_etype113 = 0;
                        $xfer += $input->readListBegin($_etype113, $_size110);
                        for ($_i114 = 0; $_i114 < $_size110; ++$_i114) {
                            $elem115 = null;
                            $elem115 = new \TColumn();
                            $xfer += $elem115->read($input);
                            $this->columns []= $elem115;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->binaryColumns);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->columnCount);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('TRowSet');
        if ($this->startRowOffset !== null) {
            $xfer += $output->writeFieldBegin('startRowOffset', TType::I64, 1);
            $xfer += $output->writeI64($this->startRowOffset);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->rows !== null) {
            if (!is_array($this->rows)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('rows', TType::LST, 2);
            $output->writeListBegin(TType::STRUCT, count($this->rows));
            foreach ($this->rows as $iter116) {
                $xfer += $iter116->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->columns !== null) {
            if (!is_array($this->columns)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('columns', TType::LST, 3);
            $output->writeListBegin(TType::STRUCT, count($this->columns));
            foreach ($this->columns as $iter117) {
                $xfer += $iter117->write($output);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->binaryColumns !== null) {
            $xfer += $output->writeFieldBegin('binaryColumns', TType::STRING, 4);
            $xfer += $output->writeString($this->binaryColumns);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->columnCount !== null) {
            $xfer += $output->writeFieldBegin('columnCount', TType::I32, 5);
            $xfer += $output->writeI32($this->columnCount);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}