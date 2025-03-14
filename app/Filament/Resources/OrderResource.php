<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\order;
use App\Models\subscription;
use App\Models\template;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Resources\Components\Tab;
use Filament\Support\RawJs;
use Filament\Tables\Actions\ExportBulkAction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction as TablesExportBulkAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Enums\FiltersLayout;
use Illuminate\Support\Facades\Response;
use pxlrbt\FilamentExcel\Columns\Column;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;

class OrderResource extends Resource
{
    protected static ?string $model = order::class;

    protected static ?string $navigationIcon = 'heroicon-m-shopping-bag';
    
    protected static ?string $navigationGroup = 'Operations';
    protected static ?int $navigationSort = 1;
    // public static function getNavigationBadge(): ?string
    // {
    //     return static::getModel()::where('status', 'Developing')->count();
    // }

    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::all()->count();

        return $count > 0 ? (string) $count : null;
    }  


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                       
                    Section::make('Pesanan')->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone_number')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('orders')
                            ->required()
                            ->columnSpanFull(),
                                        
                        Forms\Components\TextInput::make('total_payment')
                            ->mask(RawJs::make('$money($input)'))
                            ->label('Total Amount')
                            ->numeric()
                            ->prefix('IDR')
                            ->stripCharacters(',')
                            ->columnSpanFull()
                            ->default(0),
                    ])->columns(2),
                // ]),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
               
                Tables\Columns\TextColumn::make('name')
                    ->formatStateUsing(fn ($state) => ucwords($state))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->formatStateUsing(fn ($state) => ucwords($state))
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_payment')
                    ->sortable()
                    ->money('IDR'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                DateRangeFilter::make('created_at'),
                DateRangeFilter::make('updated_at'),
            ])
            // ],layout: FiltersLayout::AboveContentCollapsible)
            
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\Action::make('generatePdf')
                // ->label('Card')
                // ->icon('heroicon-s-document-text')
                // ->action(fn ($record) => static::generatePdf($record)),
                Tables\Actions\DeleteAction::make()
            ])
            
            ->bulkActions([
                TablesExportBulkAction::make()->exports([
                    
                    ExcelExport::make()->withColumns(function () {
                        // Ambil semua orders dari database dan cari nama uniknya
                        $ordersData = Order::pluck('orders')->toArray();
                        $parsedOrders = collect();
                    
                        foreach ($ordersData as $order) {
                            preg_match_all('/<li>(.*?) \((\d+)\)<\/li>/', $order, $matches);
                            if (!empty($matches[1])) {
                                foreach ($matches[1] as $index => $name) {
                                    $parsedOrders->put($name, true); 
                                }
                            }
                        }
                    
                        $columns = [
                            Column::make('name')->heading('Nama'),
                            Column::make('phone_number')->heading('Nomor HP'),
                            Column::make('created_at')->heading('Tanggal Dipesan'),
                            Column::make('total_payment')->heading('Total Pesanan'),
                        ];
                    
                        foreach ($parsedOrders->keys() as $orderName) { // Loop semua nama pesanan unik
                            $columns[] = Column::make($orderName) // Buat kolom dengan nama pesanan
                                ->heading($orderName)
                                ->getStateUsing(function ($record) use ($orderName) {
                                    $state = $record->orders; 
                                
                                    preg_match_all('/<li>(.*?) \((\d+)\)<\/li>/', $state, $matches);
                                    
                                    if (!empty($matches[1])) { 
                                        foreach ($matches[1] as $index => $name) {
                                            if (trim($name) === trim($orderName)) { 
                                                return isset($matches[2][$index]) ? (int) $matches[2][$index] : 0;
                                            }
                                        }
                                    }
                                    return 0;
                                });
                        }
                        
                    
                        return $columns;
                    })
                    ->withFilename(date('Y-m-d') . ' - Pesanan'),
                    
                    
                    
                ]),
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                    ->after(
                        function (Collection $record) {
                            foreach($record as $key => $value){
                            if ($value->ktp) {
                                Storage::disk('public')->delete($value->ktp);
                            }
                            if ($value->npwp) {
                                Storage::disk('public')->delete($value->npwp);
                            }
                            if ($value->siup) {
                                Storage::disk('public')->delete($value->siup);
                            }
                        }
                        }
                    ),
                ]),
            ]);
    }
    public static function generatePdf($record)
    {
        // Load tampilan dari Blade View "card.blade.php"
        $pdf = Pdf::loadView('card', ['record' => $record]); 

        // Nama file PDF yang akan diunduh
        $pdfName = "Card-{$record->name}.pdf";

        // Download atau tampilkan langsung
        return Response::streamDownload(fn() => print($pdf->output()), $pdfName);
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
