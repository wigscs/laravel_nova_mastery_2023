<?php

namespace Relationship\LoanFields;

use Laravel\Nova\ResourceTool;

class LoanFields extends ResourceTool
{
    /**
     * Get the displayable name of the resource tool.
     *
     * @return string
     */
    public function name()
    {
        return 'Loanfields';
    }

    /**
     * Get the component name for the resource tool.
     *
     * @return string
     */
    public function component()
    {
        return 'LoanFields';
    }
}
