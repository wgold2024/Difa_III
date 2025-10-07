<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password_changed' => $this->password_changed_at ? 'Да' : 'Нет',

            'groups' => $this->groups->map(function ($group) {
                $breadcrumb = $this->getGroupBreadcrumb($group);
                return [
                    'id' => $group->id,
                    'name' => $group->name,
                    'breadcrumb' => $breadcrumb,
                    'breadcrumb_string' => collect($breadcrumb)->pluck('label')->implode(' > ') // строка для поиска
                ];
            }),

            // Итоговая строка поиска по всем полям
            'table_search' => collect([
                $this->name,
                $this->email,
                $this->password_changed_at ? 'Да' : 'Нет',
                $this->groups
                    ->map(fn($g) => collect($this->getGroupBreadcrumb($g))->pluck('label')->implode(' > '))
                    ->implode(', '),
            ])->filter()->implode(' | '),
        ];
    }

    protected function getGroupBreadcrumb($group): array
    {
        $crumbs = [];
        $current = $group;

        while ($current) {
            $crumbs[] = [
                'label' => $current->name,
                'id'    => $current->id,
            ];
            $current = $current->parent;
        }

        return array_reverse($crumbs);
    }
}
