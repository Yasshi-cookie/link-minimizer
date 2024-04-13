<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MinimizedUrl
 *
 * @property int $id
 * @property int $user_id
 * @property string $minimized_url
 * @property string $original_url
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property User $user
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|MinimizedUrl newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MinimizedUrl newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MinimizedUrl query()
 * @method static \Illuminate\Database\Eloquent\Builder|MinimizedUrl whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MinimizedUrl whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MinimizedUrl whereMinimizedUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MinimizedUrl whereOriginalUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MinimizedUrl whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MinimizedUrl whereUserId($value)
 * @mixin \Eloquent
 */
class MinimizedUrl extends Model
{
	protected $table = 'minimized_urls';

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'minimized_url',
		'original_url'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
