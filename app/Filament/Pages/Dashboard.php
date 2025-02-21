<?php
 
namespace App\Filament\Pages;

use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;

class Dashboard extends \Filament\Pages\Dashboard
{
    protected static ?string $navigationIcon = 'heroicon-m-squares-plus';
    
    protected static ?string $navigationGroup = 'Dashboard';
    protected static bool $shouldRegisterNavigation = false;

    use HasFiltersForm;

    public function filtersForm(Form $form): Form
    {
        return $form->schema([
            Section::make('')
            ->schema([
                DatePicker::make('StartDate')
                    ->label('Start Date'),                

                DatePicker::make('EndDate')
                    ->label('End Date'),
                    
            ])
            ->columns(2)
        ]) ;

        
    }

    
}
