<?php
/*
 * This file is a part of Relations Messenger Message Standard.
 * This package is a part of Relations Messenger.
 *
 * @see       https://github.com/relmsg/message
 * @see       https://dev.relmsg.ru/packages/message
 * @copyright Copyright (c) 2018-2020 Relations Messenger
 * @author    Oleg Kozlov <h1karo@relmsg.ru>
 * @license   Apache License 2.0
 * @license   https://legal.relmsg.ru/licenses/message
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RM\Standard\Message\Serializer;

use RM\Standard\Message\Action;
use RM\Standard\Message\Exception\FormatterException;
use RM\Standard\Message\Exception\SerializerException;
use RM\Standard\Message\MessageInterface;
use RM\Standard\Message\MessageType;

/**
 * Class ActionSerializer.
 *
 * @author Oleg Kozlov <h1karo@relmsg.ru>
 *
 * @see     MessageType::ACTION
 */
class ActionSerializer extends AbstractMessageSerializer
{
    /**
     * {@inheritdoc}
     *
     * @param string $message
     *
     * @throws FormatterException
     * @throws SerializerException
     *
     * @return Action
     */
    public function deserialize(string $message): MessageInterface
    {
        $array = $this->formatter->decode($message);
        if (!$this->supports($message)) {
            throw new SerializerException(sprintf('%s can not deserialize this message.', static::class));
        }

        return new Action($array['name'], $array['parameters'] ?? []);
    }

    /**
     * {@inheritdoc}
     */
    protected function getSupportTypes(): array
    {
        return [MessageType::ACTION];
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequiredProperties(): array
    {
        return ['name'];
    }
}
