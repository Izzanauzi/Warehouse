<?

namespace Core\Middleware;

class Guest
{
    public function handle()
    {
        if ($_COOKIE['X-SESSION-APP'] ?? false) {
        header('location: /login');
        exit();
        }
    }
}