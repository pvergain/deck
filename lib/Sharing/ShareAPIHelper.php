<?php
/*
 * @copyright Copyright (c) 2020 Julius Härtl <jus@bitgrid.net>
 *
 * @author Julius Härtl <jus@bitgrid.net>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 */

declare(strict_types=1);


namespace OCA\Deck\Sharing;


use OCA\Deck\Db\CardMapper;
use OCP\IURLGenerator;
use OCP\Share\IShare;

class ShareAPIHelper {

	private $urlGenerator;
	private $cardMapper;

	public function __construct(IURLGenerator $urlGenerator, CardMapper $cardMapper) {
		$this->urlGenerator = $urlGenerator;
		$this->cardMapper = $cardMapper;
	}

	public function formatShare(IShare $share): array {
		$result = [];
		$card = $this->cardMapper->find($share->getSharedWith());
		$boardId = $this->cardMapper->findBoardId($card->getId());
		$result['share_with'] = $share->getSharedWith();
		$result['share_with_displayname'] = $card->getTitle();
		$result['share_with_link'] = $this->urlGenerator->linkToRouteAbsolute('deck.page.index') . '#/board/' . $boardId . '/card/' . $card->getId();
		return $result;
	}
}
