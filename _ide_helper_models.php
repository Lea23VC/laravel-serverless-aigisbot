<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $provider_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Auth0User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Auth0User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Auth0User query()
 * @method static \Illuminate\Database\Eloquent\Builder|Auth0User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auth0User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auth0User whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auth0User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Auth0User whereUserId($value)
 */
	class Auth0User extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $image
 * @property int|null $width
 * @property int|null $height
 * @property string|null $image_hash
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Game> $games
 * @property-read int|null $games_count
 * @method static \Illuminate\Database\Eloquent\Builder|Boxart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Boxart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Boxart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Boxart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boxart whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boxart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boxart whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boxart whereImageHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boxart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Boxart whereWidth($value)
 */
	class Boxart extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Console> $consoles
 * @property-read int|null $consoles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 */
	class Company extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $fullname
 * @property int $nasos
 * @property int|null $order_column
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Game> $games
 * @property-read int|null $games_count
 * @method static \Illuminate\Database\Eloquent\Builder|Console newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Console newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Console ordered(string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Console query()
 * @method static \Illuminate\Database\Eloquent\Builder|Console whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Console whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Console whereFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Console whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Console whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Console whereNasos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Console whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Console whereUpdatedAt($value)
 */
	class Console extends \Eloquent implements \Spatie\EloquentSortable\Sortable {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property string|null $password
 * @property string|null $release_date
 * @property string|null $developer
 * @property string|null $publisher
 * @property string|null $genre
 * @property string|null $players
 * @property int $availability
 * @property int|null $region_id
 * @property int $console_id
 * @property int|null $boxart_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \App\Models\Boxart|null $boxart
 * @property-read \App\Models\Console $console
 * @property-read \App\Models\Region|null $region
 * @method static \Illuminate\Database\Eloquent\Builder|Game newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Game newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Game query()
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereAvailability($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereBoxart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereBoxartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereConsoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereDeveloper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereGenre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game wherePlayers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game wherePublisher($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereUrl($value)
 */
	class Game extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Game> $games
 * @property-read int|null $games_count
 * @method static \Illuminate\Database\Eloquent\Builder|Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereUpdatedAt($value)
 */
	class Region extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Filament\Models\Contracts\FilamentUser {}
}

