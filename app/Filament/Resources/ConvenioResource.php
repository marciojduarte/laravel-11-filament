<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConvenioResource\Pages;
use App\Filament\Resources\ConvenioResource\RelationManagers;
use App\Models\Convenio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Support\RawJs;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\Action;


class ConvenioResource extends Resource
{
    protected static ?string $model = Convenio::class;
    protected static ?string $navigationGroup = 'Cadastros';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Convênios';
    protected static ?string $pluralLabel = 'Convênios';
    protected static ?string $label = 'Convênio';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('nome')
                ->required()
                ->label('Nome'),
            Forms\Components\TextInput::make('valor_cota')
                ->required()
                ->label('Valor da Cota')
                ->numeric()
                ->minValue(0)
                ->step(0.01)
    ->rules(['regex:/^\d+(\.\d{1,2})?$/']) // Defina regras para o formato do valor
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')->label('Nome'),
                Tables\Columns\TextColumn::make('valor_cota')->label('Valor da Cota'),
                Tables\Columns\TextColumn::make('created_at')->label('Criado em')->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')->label('Atualizado em')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Action::make('verCalendarios')
                ->label('Ver Calendários')
                ->icon('heroicon-o-calendar')
                ->action(function (Convenio $record, array $data) {
                    // Redirect to a custom page
                    return redirect()->route('filament.resources.convenio.calendarios', $record);
                })
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListConvenios::route('/'),
            'create' => Pages\CreateConvenio::route('/create'),
            'edit' => Pages\EditConvenio::route('/{record}/edit'),
           // 'calendarios' => Pages\ListConvenioCalendarios::route('/{record}/calendarios'), // New custom page
        ];
    }
}
