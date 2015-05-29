<?php namespace CodeCommerce\Http\Middleware;

use Closure;
use Illuminate\Auth\Guard;
use Illuminate\Support\MessageBag;

class AdminAuthenticate {

    /**
     * The Guard implementation.
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     * @param  Guard $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

	/**
	 * Handle an incoming request.
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if ($this->auth->guest())
        {
            return $request->ajax() ? response('Unauthorized.', 401) : redirect()->guest('auth/login');
        }

        if(!$this->auth->user()->isAdmin)
        {
            $errors = new MessageBag(['Unauthorized. Access Denied']);
            return redirect('auth/login')->withErrors($errors);
        }

		return $next($request);
	}

}
