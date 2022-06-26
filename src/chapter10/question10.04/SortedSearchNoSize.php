<?php

class SortedSearchNoSize
{
	protected Listy $listy;

	public function __construct(Listy $listy)
	{
		$this->listy = $listy;
	}

	public function search(int $target): int
	{
		return $this->listy->elementAt($target);
	}
}
