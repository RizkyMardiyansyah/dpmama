<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TemplateResource\Pages;
use App\Filament\Resources\TemplateResource\RelationManagers;
use App\Models\template;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;



class TemplateResource extends Resource
{
    protected static ?string $model = template::class;

    protected static ?string $navigationIcon = 'heroicon-m-queue-list';
    protected static ?string $navigationLabel = 'Menu';
    protected static ?string $label = 'Menu';
protected static ?string $pluralLabel = 'Menu';


    
    protected static ?string $navigationGroup = 'Operations';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form

    
    {
        return $form
        ->schema([
            Section::make('Menu')->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Nama')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
                
                Forms\Components\FileUpload::make('image')
                    ->label('Gambar')
                    ->required()
                    ->disk('public')
                    ->downloadable()
                    ->columnSpanFull(),             

                Forms\Components\TextInput::make('price')
                    ->label('Harga')
                    ->mask(RawJs::make('$money($input)'))
                    ->required()
                    ->prefix('IDR')
                    ->default(0),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Nama')
                    ->formatStateUsing(fn ($state) => ucwords($state))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Nama')
                    ->sortable()
                    ->money('IDR'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->after(function (Collection $record) {
                            foreach ($record as $key => $value) {
                                if ($value->image) {
                                    Storage::disk('public')->delete($value->image);
                                }                           
                            }
                        }),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTemplates::route('/'),
            'create' => Pages\CreateTemplate::route('/create'),
            'edit' => Pages\EditTemplate::route('/{record}/edit'),
        ];
    }
}
