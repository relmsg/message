<?php
/**
 * This file is a part of Relations Messenger API Message Standard.
 * This package is a part of Relations Messenger.
 *
 * @link      https://gitlab.com/relmsg/message
 * @link      https://dev.relmsg.ru/packages/message
 * @copyright Copyright (c) 2018-2020 Relations Messenger
 * @author    h1karo <h1karo@outlook.com>
 * @license   Apache License 2.0
 * @license   https://legal.relmsg.ru/licenses/message
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RM\Standard\Message\Serializer;

use RM\Standard\Message\MessageInterface;

/**
 * Interface MessageSerializerInterface
 *
 * @package RM\Standard\Message\Serializer
 * @author  h1karo <h1karo@outlook.com>
 */
interface MessageSerializerInterface
{
    /**
     * Serializes the message into transfer-safe string format.
     *
     * @param MessageInterface $message
     *
     * @return string
     */
    public function serialize(MessageInterface $message): string;

    /**
     * Parses the message from transfer-safe format.
     *
     * @param string $message
     *
     * @return MessageInterface
     */
    public function deserialize(string $message): MessageInterface;

    /**
     * @param MessageInterface|string $message
     *
     * @return bool
     */
    public function supports($message): bool;
}