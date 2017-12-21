<?php

namespace Neox\Ramen\Messenger\Templates\Payload;

use Neox\Ramen\Messenger\Traits\HasImageUrl;
use Neox\Ramen\Messenger\Traits\HasPayload;
use Neox\Ramen\Messenger\Traits\HasTitle;

/**
 * Class QuickReply
 * @package Neox\Ramen\Messenger\Templates\Payload
 */
class QuickReply
{
    use HasTitle;
    use HasImageUrl;
    use HasPayload;

    /**
     * @var string
     */
    protected $contentType;

    /**
     * @return string|null
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param string $contentType
     * @return $this
     */
    public function setContentType(string $contentType)
    {
        $this->contentType = $contentType;
        return $this;
    }

    public function toArray()
    {
        $data = [
            "content_type" => $this->getContentType(),
            "title"        => $this->getTitle(),
        ];

        if (!empty($this->getImageUrl())) {
            $data['image_url'] = $this->getImageUrl();
        }

        if (!empty($this->getPayload())) {
            $data['payload'] = $this->getPayload();
        }

        return $data;
    }
}
