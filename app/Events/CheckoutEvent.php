<?php namespace CodeCommerce\Events;

use CodeCommerce\Events\Event;

use Illuminate\Queue\SerializesModels;

class CheckoutEvent extends Event {

	use SerializesModels;
    private $order;
    private $user;

    /**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($user, $order)
	{
		$this->user = $user;
        $this->order = $order;
	}

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
}
