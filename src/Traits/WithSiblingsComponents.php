<?php

declare(strict_types=1);

namespace VEY\DataTablesLivewire\Traits;

trait WithSiblingsComponents {

    /** 
     * @var array<array<string>> $beforeCmpLWComponents 
     * @example [
     *      'lw_cmp_name' => [
     *         'cmp_props' => [], // optional
     *         'cmp_wrapper_classes' => 'col-auto', // optional
     *     ],
     * ]
     */
    public array $beforeCmpLWComponents = [];

    /** @var array<string> $userHeaderHTMLComponents */
    public array $userHeaderHTMLComponents = [];

    /** @var array<array<string>> $headerLWComponents */
    public array $headerLWComponents = [];

    /**
     * Add footer Livewire components
     * @var array<array<string, mixed> $footerLWComponents
     * @example [
     *      'lw_cmp_name' => [
     *         'cmp_props' => [], // optional
     *         'cmp_wrapper_classes' => 'col-auto', // optional
     *     ],
     * ]
     */
    public array $footerLWComponents = [];

    /**
     * After search HTML Elements
     * @var array<string> $afterSearchHTMLComponents
     */
    public array $afterSearchHTMLComponents = [];

    /**
     * After search Livewire components
     * @var array<array<string, mixed> $afterSearchLWComponents
     * @example [
     *      'lw_cmp_name' => [
     *         'cmp_props' => [], // optional
     *         'cmp_wrapper_classes' => 'col-auto', // optional
     *     ],
     * ]
     */
    public array $afterSearchLWComponents = [];
}
