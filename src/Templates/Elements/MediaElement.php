<?php

namespace Neox\Lumen\Messenger\Templates\Elements;

use Neox\Lumen\Messenger\Templates\Traits\HasButtons;
use Neox\Lumen\Messenger\Templates\Traits\HasUrl;

/**
 * Class MediaElement
 * @package Neox\Jarvis\Messenger\Templates\Elements
 */
class MediaElement implements ElementInterface
{
    public const TYPE_IMAGE = 'image';
    public const TYPE_VIDEO = 'video';

    protected $types = [
        self::TYPE_IMAGE,
        self::TYPE_VIDEO,
    ];

    use HasButtons;
    use HasUrl;

    /**
     * @var string
     */
    protected $mediaType;

    /**
     * The attachment ID of the image or video. Cannot be used if url is set.
     *
     * @var ?string
     */
    protected $attachmentId;

    /**
     * @return null|string
     */
    public function getAttachmentId(): ?string
    {
        return $this->attachmentId;
    }

    /**
     * @param string $attachmentId
     */
    public function setAttachmentId(string $attachmentId)
    {
        $this->attachmentId = $attachmentId;
    }

    /**
     * @return string
     */
    public function getMediaType(): string
    {
        return $this->mediaType;
    }

    /**
     * @param string $mediaType
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setMediaType(string $mediaType)
    {
        $this->assertType($mediaType);
        $this->mediaType = $mediaType;
        return $this;
    }

    /**
     * @param string $type
     *
     * @throws \InvalidArgumentException
     */
    public function assertType(string $type)
    {
        if (!in_array($type, $this->types)) {
            throw new \InvalidArgumentException('Unsupported type');
        }
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $data = [
            "media_type" => $this->getMediaType(),
        ];

        if ($this->getUrl() !== null && $this->getAttachmentId() !== null) {
            throw new \InvalidArgumentException('url and attachment_id cannot be used at the same time');
        }

        if (!empty($this->getUrl())) {
            $data['url'] = $this->getUrl();
        }

        if (!empty($this->getAttachmentId())) {
            $data['attachment_id'] = $this->getAttachmentId();
        }

        if (!empty($this->getButtons())) {
            $data['buttons'] = $this->getButtonsAsArray();
        }

        return $data;
    }
}
