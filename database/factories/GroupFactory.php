<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    protected $model = Group::class;

    public function definition()
    {
        $ownerId = User::inRandomOrder()->first()->id;

        return [
            'group_name' => $this->faker->unique()->name(),
            'group_owner_id' => $ownerId,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Group $group) {
            $group->groupMember()->create([
                'member_id' => $group->group_owner_id,
            ]);
        });
    }
}
