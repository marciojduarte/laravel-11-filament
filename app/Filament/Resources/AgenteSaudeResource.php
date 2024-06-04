<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgenteSaudeResource\Pages;
use App\Filament\Resources\AgenteSaudeResource\RelationManagers;
use App\Models\AgenteSaude;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AgenteSaudeResource extends Resource
{
    protected static ?string $model = AgenteSaude::class;
    protected static ?string $navigationGroup = 'Cadastros';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Agentes de Saúde';
    protected static ?string $pluralLabel = 'Agentes de Saúde';
    protected static ?string $label = 'Agente de Saúde';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->required()
                    ->maxLength(100)
                    ->label('Nome'),
                Forms\Components\TextInput::make('telefone')
                    ->required()
                    ->maxLength(20)
                    ->label('Telefone')
                    // ->tel()
                    // ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
                    ->mask('(99)99999-9999')
                    ->placeholder('(DD)9000-00009'),
                Forms\Components\TextInput::make('regiao')
                    ->required()
                    ->maxLength(100)
                    ->label('Região'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')->label('Nome'),
                Tables\Columns\TextColumn::make('telefone')->label('Telefone'),
                Tables\Columns\TextColumn::make('regiao')->label('Região'),
            ])
            ->filters([
                Tables\Filters\Filter::make('nome')
                    ->label('Pesquisar por Nome')
                    ->query(fn (Builder $query, array $data) => $query->where('nome', 'like', "%{$data['value']}%"))
                    ->form([
                        Forms\Components\TextInput::make('value')
                            ->label('Nome')
                            ->placeholder('Digite o nome')
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListAgenteSaudes::route('/'),
            'create' => Pages\CreateAgenteSaude::route('/create'),
            'edit' => Pages\EditAgenteSaude::route('/{record}/edit'),
        ];
    }
}
