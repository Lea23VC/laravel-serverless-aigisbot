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
 * @property string $discord_id
 * @property string $name
 * @property string|null $icon
 * @property string|null $description
 * @property string|null $type
 * @property string|null $summary
 * @property int $is_monetized
 * @property int $bot_public
 * @property int $bot_require_code_grant
 * @property string|null $verify_key
 * @property int|null $flags
 * @property int $hook
 * @property array|null $redirect_uris
 * @property array|null $owner
 * @property int|null $approximate_guild_count
 * @property array|null $interactions_event_types
 * @property int|null $interactions_version
 * @property int|null $explicit_content_filter
 * @property int|null $rpc_application_state
 * @property int|null $store_application_state
 * @property int|null $verification_state
 * @property int $integration_public
 * @property int $integration_require_code_grant
 * @property int|null $discoverability_state
 * @property string|null $discovery_eligibility_flags
 * @property int|null $monetization_state
 * @property string|null $monetization_eligibility_flags
 * @property string|null $team
 * @property string|null $guild
 * @property string|null $interactions_endpoint_url
 * @property array|null $integration_types
 * @property array|null $integration_types_config
 * @property int $internal_guild_restriction
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DiscordCommand> $commands
 * @property-read int|null $commands_count
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication query()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereApproximateGuildCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereBotPublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereBotRequireCodeGrant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereDiscordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereDiscoverabilityState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereDiscoveryEligibilityFlags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereExplicitContentFilter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereFlags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereGuild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereHook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereIntegrationPublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereIntegrationRequireCodeGrant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereIntegrationTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereIntegrationTypesConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereInteractionsEndpointUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereInteractionsEventTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereInteractionsVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereInternalGuildRestriction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereIsMonetized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereMonetizationEligibilityFlags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereMonetizationState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereOwner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereRedirectUris($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereRpcApplicationState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereStoreApplicationState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereTeam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereVerificationState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordApplication whereVerifyKey($value)
 */
	class DiscordApplication extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $command_id
 * @property int $application_id
 * @property int $discord_application_id
 * @property string $version
 * @property string|null $default_member_permissions
 * @property int $type
 * @property string $name
 * @property string $description
 * @property int $dm_permission
 * @property array|null $contexts
 * @property array|null $integration_types
 * @property array $options
 * @property int $nsfw
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\DiscordApplication $application
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordCommand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordCommand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordCommand query()
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordCommand whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordCommand whereCommandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordCommand whereContexts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordCommand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordCommand whereDefaultMemberPermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordCommand whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordCommand whereDiscordApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordCommand whereDmPermission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordCommand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordCommand whereIntegrationTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordCommand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordCommand whereNsfw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordCommand whereOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordCommand whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordCommand whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiscordCommand whereVersion($value)
 */
	class DiscordCommand extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $development_unit
 * @property string $average_value_index
 * @property string $observed_dollar
 * @property string $agreement_dollar
 * @property string $euro
 * @property float $consumer_price_index
 * @property string $monthly_tax_unit
 * @property float $monthly_economic_activity_index
 * @property float $monetary_policy_rate
 * @property string $copper_pound
 * @property float $unemployment_rate
 * @property string $bitcoin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialIndicator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialIndicator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialIndicator query()
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialIndicator whereAgreementDollar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialIndicator whereAverageValueIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialIndicator whereBitcoin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialIndicator whereConsumerPriceIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialIndicator whereCopperPound($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialIndicator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialIndicator whereDevelopmentUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialIndicator whereEuro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialIndicator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialIndicator whereMonetaryPolicyRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialIndicator whereMonthlyEconomicActivityIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialIndicator whereMonthlyTaxUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialIndicator whereObservedDollar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialIndicator whereUnemploymentRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FinancialIndicator whereUpdatedAt($value)
 */
	class FinancialIndicator extends \Eloquent {}
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
 * @property-read \App\Models\Boxart|null $boxart
 * @property-read \App\Models\Console $console
 * @property-read \App\Models\Region|null $region
 * @method static \Illuminate\Database\Eloquent\Builder|Game newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Game newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Game query()
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereAvailability($value)
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

