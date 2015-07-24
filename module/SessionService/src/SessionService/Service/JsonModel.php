<?php

namespace SessionService\Service;

/**
 * allow simple Objects for JsonModel.
 * see https://github.com/zendframework/zf2/issues/6199
 */

class JsonModel extends \Zend\View\Model\JsonModel
{
    private $object = null;

    public function __construct($variables, $jsonpCallback = null)
    {
        $context = $variables;

        if (null !== $variables && is_object($variables))
        {
            $context = null;

            $this->object = $variables;
        }

        parent::__construct($context);

        parent::setJsonpCallback($jsonpCallback);
    }


    /**
     * Override serialize to allow the serialization of an object.
     * @return string JSON string.
     */
    public function serialize()
    {
        if (null !== $this->object)
        {
            $json = json_encode($this->object);

            if (null !== $this->jsonpCallback)
            {
                return $this->jsonpCallback.'('.$json.');';
            }

            return $json;
        }

        return parent::serialize();
    }
}

