<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\ValueObjects\RedirectableUrl;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UrlPair
 *
 * @property int $id
 * @property int $user_id
 * @property string $minimized_url
 * @property string $original_url
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property User $user
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|UrlPair newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UrlPair newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UrlPair query()
 * @method static \Illuminate\Database\Eloquent\Builder|UrlPair whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UrlPair whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UrlPair whereUrlPair($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UrlPair whereOriginalUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UrlPair whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UrlPair whereUserId($value)
 * @mixin \Eloquent
 */
class UrlPair extends Model
{
    protected $table = 'url_pairs';

    protected $casts = [
        'user_id' => 'int',
    ];

    protected $fillable = ['user_id', 'minimized_url', 'original_url'];

    /**
     * @return RedirectableUrl
     */
    public function getMinimizedUrl(): RedirectableUrl
    {
        return new RedirectableUrl($this->minimized_url);
    }

    /*
    |--------------------------------------------------------------------------
    | relations
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
