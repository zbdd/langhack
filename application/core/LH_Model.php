<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class LH_Model extends CI_Model {
	public $table = '';
	
	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * 레코드 생성
	 * 
	 * 레코드를 새로 생성한다. 성공하면 inserted_id를 반환한다.
	 * 
	 * @access	public
	 * @param	array 	key가 field명이고, value가 입력할 데이터인 배열값
	 * @return	mixed	성공시 inserted_id, 실패시 false
	 */
	public function create($data) {
		$date = date('Y-m-d H:i:s');

		// if created_at exists
		if($this->db->field_exists('created_at', $this->table)) {
			$data['created_at'] = $date;
		}

		// if updated_at exists
		if($this->db->field_exists('updated_at', $this->table)) {
			$data['updated_at'] = $date;
		}
		
		// if position exists
/*		if($this->db->field_exists('position', $this->table)) {
			if(isset($this->position)
				&& !empty($this->position)) {
				$sql = 'SELECT MAX(position) AS position FROM ' . $this->table . ' WHERE';
				foreach($this->position as $position_scope) {
					$sql .= ' ' . $position_scope . ' = ' . $data[$position_scope];
				}
			} else {
				$sql = 'SELECT MAX(position) AS position FROM ' . $this->table;
			}
			
			$result = $this->query($sql);
						
			if($result
				&& $result->num_rows() > 0) {
				$data['position'] = $result->row()->position + 1;
			} else {
				$data['position'] = 1;
			}
		}
*/
		if($this->db->insert($this->table, $data)) {
			$insert_id = $this->db->insert_id();
			return $insert_id;
		} else {
			return false;
		}
	}

	/**
	 * 레코드 업데이트
	 * 
	 * 레코드를 업데이트 한다.
	 * 
	 * @access	public
	 * @param	array 	key가 field명이고, value가 수정할 데이터인 배열값
	 * @param	mixed 	key가 field명이고, value가 조회할 데이터인 배열값 (string으로 조건문을 직접 입력해도 무방)
	 * @return	boolean
	 */
	public function update($data, $where) {
		$this->is_written = true;
		$date = date('Y-m-d H:i:s');

		// if updated_at exists
		//if(!array_key_exists('last_action_at',$data)): //최종 활동 기록 시간 수정시는 update 하지 않음
			if($this->db->field_exists('updated_at', $this->table)) {
				$data['updated_at'] = $date;
			}
		//endif;
		
		if($this->db->update($this->table, $data, $where)) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * 레코드 삭제
	 * 
	 * 레코드를 삭제한다.
	 * 
	 * @access	public
	 * @param	mixed 	key가 field명이고, value가 조회할 데이터인 배열값 (string으로 조건문을 직접 입력해도 무방)
	 * @return	boolean
	 */
	public function delete($where) {
		$this->is_written = true;

		if($this->db->delete($this->table, $where)) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * 레코드 조회
	 * 
	 * 레코드 조회와 관련한 기본 private 함수
	 * 
	 * @access	private
	 * @param	mixed 	key가 field명이고, value가 조회할 데이터인 배열값 (string으로 조건문을 직접 입력해도 무방)
	 * @param	mixed	array나 string으로 입력된 정렬문값 (Active Record의 order_by 메소드에 입력할 값과 동일)
	 * @param	integer	limit 구문의 offset
	 * @param	integer	limit 구문의 limit
	 * @return	object	active record 결과 오브젝트
	 */
	private function _find($where = null, $order = null, $offset = null, $limit = null) {
		// from
		$this->db->from($this->table);
		
		// where
		if(!is_null($where)) $this->db->where($where);

		// order by
		if(!is_null($order)) $this->db->order_by($order);

		// limit
		if(!is_null($offset)) $this->db->offset($offset);
		if(!is_null($limit)) $this->db->limit($limit);

		return $this->db->get();
	}
	
	/**
	 * 레코드 조회 (다수열)
	 * 
	 * _find를 이용하는 유틸리티 함수. 다수의 결과 레코드를 리턴함.
	 * 
	 * @access	public
	 * @param	mixed 	key가 field명이고, value가 조회할 데이터인 배열값 (string으로 조건문을 직접 입력해도 무방)
	 * @param	mixed	array나 string으로 입력된 정렬문값 (Active Record의 order_by 메소드에 입력할 값과 동일)
	 * @param	integer	limit 구문의 offset
	 * @param	integer	limit 구문의 limit
	 * @return	array	active record 결과 오브젝트 배열	
	 */
	public function find($where = null, $order = null, $offset = null, $limit = null) {
		$result = $this->_find($where, $order, $offset, $limit);

		return $result->num_rows() > 0 ? $result->result() : array();
	}

	/**
	 * 레코드 조회 (단일열)
	 * 
	 * _find를 이용하는 유틸리티 함수. 하나의 결과만 리턴함.
	 * 
	 * @access	public
	 * @param	mixed 	key가 field명이고, value가 조회할 데이터인 배열값 (string으로 조건문을 직접 입력해도 무방)
	 * @param	mixed	array나 string으로 입력된 정렬문값 (Active Record의 order_by 메소드에 입력할 값과 동일)
	 * @param	integer	limit 구문의 offset
	 * @return	mixed	active record 결과 오브젝트, 리턴된 결과가 없을시 false 리턴	
	 */
	public function find_one($where = null, $order = null, $offset = null) {
		$result = $this->_find($where, $order, $offset, 1);

		return $result && $result->num_rows() > 0 ? $result->row() : false;		
	}
	
	/**
	 * 필드 선택자
	 * 
	 * Active Record의 select 메소드와 같이 select시 필요한 필드만 선택함. ex> $this->Foo_model->columns('email')->find...
	 * 
	 * @access	public
	 * @param	string 	가져올 필드명
	 * @param	boolean	각 필드의 escaping 여부. default로는 escaping을 하나(false), escaping을 하지 않으려면 true 입력
	 * @return	object	method chaining을 위한 self intance 리턴	
	 */
	public function columns($columns, $escaping = false) {
		$this->db->select($columns, $escaping);

		return $this;
	}

	/**
	 * 테이블 조인
	 * 
	 * Active Record의 join 메소드 wrapper. ex> $this->Foo_model->with('user', 'user_id', 'left')->find...
	 * 
	 * @access	public
	 * @param	string 	join할 테이블명
 	 * @param	string 	join할 key의 이름 
	 * @param	string	조인 형태. 비워두면 inner join.
	 * @return	object	method chaining을 위한 self intance 리턴	
	 */
	public function with($table, $foreign_key, $join_method = 'inner') {
		if(strpos($table, ' ') === false) {
			$table_alias = $table;
		} else {
			$table_alias = end(explode(' ', $table));
		}
		
		$this->db->join($table, $table_alias . '.id = ' . $this->table . '.' . $foreign_key, $join_method);

		return $this;
	}

	/**
	 * Raw 쿼리 wrapper
	 * 
	 * Active Record의 query wrapper
	 * 
	 * @access	public
	 * @param	string 	query문
 	 * @param	array 	bind할 파라메터들 
	 * @return	array	active record 결과 오브젝트 배열
	 */
	public function query($sql, $params = array()) {
		$result = $this->db->query($sql, $params);
		
		return $result;
	}

	/**
	 * 레코드 갯수
	 * 
	 * Active Record의 count_all_results 메소드 wrapper
	 * 
	 * @access	public
	 * @param	mixed 	key가 field명이고, value가 조회할 데이터인 배열값 (string으로 조건문을 직접 입력해도 무방)
	 * @return	integer	조건에 해당하는 레코드 갯수
	 */
	public function count_records($where = null) {
		if(!is_null($where)) $this->db->where($where);
		$this->db->from($this->table);

		return $this->db->count_all_results();
	}

	/**
	 * 레코드 존재 여부
	 * 
	 * 주어진 조건에 해당하는 레코드가 존재하는지 여부를 판단.
	 * 
	 * @access	public
	 * @param	mixed 	key가 field명이고, value가 조회할 데이터인 배열값 (string으로 조건문을 직접 입력해도 무방)
	 * @return	boolean
	 */
	public function is_exists($where) {
		if($this->count_records($where) > 0) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * destructor
	 */
	public function __destruct() {
		$this->db->close();
	}
}
/* EOF */