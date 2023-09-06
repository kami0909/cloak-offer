<?php

namespace App\Nova;

use App\Models\Country;
use App\Models\Offer;
use App\Models\Source;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MultiSelect;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Tag;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Script;
use Illuminate\Support\Str;

class LandingPage extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\LandingPage>
     */
    public static $model = \App\Models\LandingPage::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Title')
                ->rules('required')
                ->creationRules('unique:landing_pages,title')
                ->updateRules('unique:landing_pages,title,{{resourceId}}'),
            Slug::make('Path')
                ->from('Title')
                ->rules('required')
                ->creationRules('unique:landing_pages,path')
                ->updateRules('unique:landing_pages,title,{{resourceId}}'),
            Select::make('Supplier', 'offer_id')
                ->searchable()
                ->options($this->getOffers())
                ->required(),
            MultiSelect::make('Included Countries')
                ->options($this->getCountries())
                ->required(),
            MultiSelect::make('Excluded Countries')
                ->options($this->getCountries())
                ->required(),
            Text::make('Target Url')
                ->required(),
            Text::make('Redirect Url')
                ->required(),
            Select::make('Source', 'source_id')
                ->searchable()
                ->options($this->getSources())
                ->required(),
        ];
    }

    protected function getCountries(): array
    {
        $countries = Country::pluck('name', 'code')->toArray();
        return $countries;
    }

    protected function getOffers(): array
    {
        $offers = Offer::pluck('title', 'id')->toArray();
        return $offers;
    }

    protected function getSources(): array
    {
        $sources = Source::pluck('name', 'id')->toArray();
        return $sources;
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
