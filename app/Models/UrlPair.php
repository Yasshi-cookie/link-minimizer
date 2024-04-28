<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\ValueObjects\MinimizedUrl;
use App\ValueObjects\UrlPairId;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UrlPair
 *
 * @property int $id
 * @property string $minimized_url
 * @property string $original_url
 * @property Carbon $created_at
 * @property Carbon $updated_at
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

    protected $fillable = ['minimized_url', 'original_url'];

    /**
     * @return UrlPairId
     */
    public function getId(): UrlPairId
    {
        return new UrlPairId($this->id);
    }

    /**
     * @return MinimizedUrl
     */
    public function getMinimizedUrl(): MinimizedUrl
    {
        return new MinimizedUrl($this->minimized_url);
    }
}
