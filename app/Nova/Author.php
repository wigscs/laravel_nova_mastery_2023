<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class Author extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Author>
     */
    public static $model = \App\Models\Author::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()
                ->sortable(),

            Avatar::make('Avatar')
                ->showWhenPeeking()
                ->rounded()
                ->rules('required', File::image()->max(1024 * 10))
                ->path('authors'),

            Text::make('Name')
                ->showWhenPeeking()
                ->sortable()
                ->rules('required', 'string', 'max:255'),

            Trix::make('Biography')
                ->showWhenPeeking()
                ->fullWidth()
                ->rules('required', 'string', 'max:10000'),
        ];
    }

    public function subtitle()
    {
        return str($this->biography)->limit(120);
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
