namespace App\Http\Controllers;

// 1. 作成したRequestクラスをインポート
use App\Http\Requests\UserRegisterPost; 
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 2. 引数を Request $request から UserRegisterPost $request に変更
    public function register(UserRegisterPost $request)
    {
        // ここに到達した時点でバリデーションは完了しています
        // 検証済みのデータは $request->validated() で取得できます
        $validated = $request->validated();

        // 登録処理...
    }
}
