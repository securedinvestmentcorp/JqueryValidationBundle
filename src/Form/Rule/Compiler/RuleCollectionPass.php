<?php
namespace Boekkooi\Bundle\JqueryValidationBundle\Form\Rule\Compiler;

use Boekkooi\Bundle\JqueryValidationBundle\Form\Rule\ConstraintResolverInterface;
use Boekkooi\Bundle\JqueryValidationBundle\Form\Rule\FormPassInterface;
use Boekkooi\Bundle\JqueryValidationBundle\Form\FormRuleCollection;
use Boekkooi\Bundle\JqueryValidationBundle\Form\Rule\Mapping;
use Boekkooi\Bundle\JqueryValidationBundle\Validator\ConstraintCollection;

/**
 * @author Warnar Boekkooi <warnar@boekkooi.net>
 */
class RuleCollectionPass implements FormPassInterface
{
    /**
     * @var ConstraintResolverInterface
     */
    private $constraintResolver;

    public function __construct(ConstraintResolverInterface $constraintResolver)
    {
        $this->constraintResolver = $constraintResolver;
    }

    public function process(FormRuleCollection $collection, ConstraintCollection $constraints)
    {
        $collection->add(
            $collection->getView(),
            $this->constraintResolver->resolve($constraints, $collection->getForm())
        );
    }
}
