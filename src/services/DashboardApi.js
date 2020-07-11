/*
 * @copyright Copyright (c) 2020 Jakob Röhrl <jakob.roehrl@web.de>
 *
 * @author Jakob Röhrl <jakob.roehrl@web.de>
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
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 */

import axios from '@nextcloud/axios'
import { generateOcsUrl, generateRemoteUrl } from '@nextcloud/router'

export class DashboardApi {

	url(url) {
		url = `/apps/deck${url}`
		return generateOcsUrl(url)
	}

	findAllWithDue(data) {
		return axios.get(this.url(`/api/v1.0/dashboard/dashboard/due`))
			.then(
				(response) => Promise.resolve(response.data),
				(err) => Promise.reject(err)
			)
			.catch((err) => Promise.reject(err)
			)
	}

	findMyAssignedCards(data) {
		return axios.get(this.url(`/ocs/v2.php/apps/deck/api/v1.0/dashboard/assigned`))
			.then(
				(response) => Promise.resolve(response.data),
				(err) => Promise.reject(err)
			)
			.catch((err) => Promise.reject(err)
			)
	}

}
