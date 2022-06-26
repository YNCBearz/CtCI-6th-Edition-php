<?php

class SparseSearch
{
	protected array $items;

	public function __construct(array $items)
	{
		$this->items = $items;
	}

	public function search(string $target): int
	{
		return 0;
	}
}
