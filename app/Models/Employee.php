

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'age','department', 'designation', 'area_id', 'created_at', 'updated_at'];

    public function area(): HasOne
    {
        return $this->hasOne(area::class);
    }
}
