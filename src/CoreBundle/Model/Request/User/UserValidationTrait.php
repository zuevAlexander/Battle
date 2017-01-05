<?php
/**
 * Created by PhpStorm.
 * User: ib
 * Date: 19.10.16
 * Time: 17:23
 */

namespace CoreBundle\Model\Request\User;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class UserValidationTrait.
 */
trait UserValidationTrait
{

    /**
     * @var string
     *
     * @Assert\Length(
     *     min="2",
     *     max="255"
     * )
     * @Assert\NotBlank()
     */
    protected $name = '';

    /**
     * @var string
     *
     * @Assert\Length(
     *     min="4",
     *     max="255"
     * )
     * @Assert\NotBlank()
     */
    protected $password = '';

}