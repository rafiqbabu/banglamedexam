<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mod_schedule
 *
 * @author jnahian
 * @property common_lib $common_lib
 * @property mod_file_upload $mod_file_upload
 */
class Mod_schedule extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_file_upload');
    }

    /**
     * Checks the schedules availability and returns TRUE if available
     * @return bool
     */
    public function check_schedule_availability($id = null)
    {
        $time_from = $this->input->post('time_from');
        $time_to = $this->input->post('time_to');
        $where = array(
            'year' => $this->input->post('year'),
            'session' => $this->input->post('session'),
            'course_code' => $this->input->post('course_code'),
            'faculty_code' => $this->input->post('faculty_code'),
            'batch_code' => $this->input->post('batch_code'),
            'room_id' => $this->input->post('room_id'),
            'date' => $this->input->post('date'),
        );

        $this->db->select('id,time_from,time_to');
        $this->db->where($where);
        if ($id) {
            $this->db->where_not_in('id', $id);
        }
        $query = $this->db->get('sif_schedule');

        if ($query->num_rows() > 0) {
            $results = $query->result();
            $time_from = strtotime($time_from);
            $time_to = strtotime($time_to);
            foreach ($results as $result) {
                $cls_time_from = strtotime($result->time_from);
                $cls_time_to = strtotime($result->time_to);
                if ($cls_time_from < $time_from && $cls_time_to <= $time_from) {
                    return true;
                } elseif ($cls_time_from >= $time_to && $cls_time_to > $time_to) {
                    return true;
                } else {
                    return FALSE;
                }
            }
        }
        return TRUE;
    }

    function save_data()
    {
        $data = array(
            'schedule_type' => $this->input->post('schedule_type'),
            'schedule_name' => $this->input->post('schedule_name'),
            'paper' => $this->input->post('paper'),
            'year' => $this->input->post('year'),
            'session' => $this->input->post('session'),
            'course_code' => $this->input->post('course_code'),
            'faculty_code' => $this->input->post('faculty_code'),
            'batch_code' => $this->input->post('batch_code'),
            'topic_id' => implode(',', $this->input->post('topic_id')),
            'subject_id' => implode(',', $this->input->post('subject_id')),
            'service_pack_id' => $this->input->post('service_pack_id'),
            'date' => $this->input->post('date'),
            'time_from' => $this->input->post('time_from'),
            'time_to' => $this->input->post('time_to'),
            'room_id' => $this->input->post('room_id'),
            'teacher_id' => $this->input->post('teacher_id'),
            'executive_id' => $this->input->post('executive'),
            'support_stuff_id' => $this->input->post('support_stuff'),
            'status' => 1,
            'created_by' => AUTH_EMAIL,
        );

        $result = $this->db->insert('sif_schedule', $data);

        if ($result) {
            return $result;
        }
        return FALSE;
    }

    function update_data($id)
    {
        $data = array(
            'schedule_type' => $this->input->post('schedule_type'),
            'schedule_name' => $this->input->post('schedule_name'),
            'paper' => $this->input->post('paper'),
            'year' => $this->input->post('year'),
            'session' => $this->input->post('session'),
            'course_code' => $this->input->post('course_code'),
            'faculty_code' => $this->input->post('faculty_code'),
            'batch_code' => $this->input->post('batch_code'),
            'topic_id' => implode(',', $this->input->post('topic_id')),
            'subject_id' => implode(',', $this->input->post('subject_id')),
            'service_pack_id' => $this->input->post('service_pack_id'),
            'date' => $this->input->post('date'),
            'time_from' => $this->input->post('time_from'),
            'time_to' => $this->input->post('time_to'),
            'room_id' => $this->input->post('room_id'),
            'teacher_id' => $this->input->post('teacher_id'),
            'executive_id' => $this->input->post('executive'),
            'support_stuff_id' => $this->input->post('support_stuff'),
            'status' => 1,
            'updated_at' => date('Y-m-d h:i:s'),
            'updated_by' => AUTH_EMAIL,
        );
        $this->db->where('id', $id);
        $result = $this->db->update('sif_schedule', $data);

        if ($result) {
            return $result;
        }
        return FALSE;
    }

    function count_records()
    {
        $query = $this->db->select('id');
        $query = $this->db->get('sif_schedule');
        if ($query) {
            return $query->num_rows();
        } else {
            return FALSE;
        }
    }


    function get_records_list($limit = 20, $row = 0)
    {
        $query = $this->db->order_by("date", 'ASC');
        $query = $this->db->get('sif_schedule', $limit, $row);

        if ($query->num_rows() > 0) {
            $results = $query->result();
            return $results;
        }
        return FALSE;
    }

    public function get_search_data()
    {
        $data = array();

        $type = $this->input->post('type', true);
        $view = $this->get_routine_name($type);
        $data['view'] = $view;

        $year = $this->input->post('year', true);
        $session = $this->input->post('session', true);
        $course_code = $this->input->post('course_code', true);
        $faculty_code = $this->input->post('faculty_code', true);
        $batch_code = $this->input->post('batch_code', true);
        $room_id = $this->input->post('room_id', true);
        $date_from = $this->input->post('date_from', true);
        $date_to = $this->input->post('date_to', true);

        $schedule_type = $this->common_lib->get_schedule_type_array();

        $data['schedule_name'] = get_name_by_id('sif_course', $course_code, 'course_code', 'course_name');
        $data['schedule_name'] .= " - ";
        $data['schedule_name'] .= get_faculty_name_by_course_code_faculty_code('sif_faculty', $course_code, $faculty_code);
        $data['schedule_name'] .= " - ";
        //$data['schedule_name'] .= get_batch_name($course_code, $faculty_code, $batch_code);
        $data['schedule_name'] .= $schedule_type[$type];


        $year ? $this->db->where("year", $year) : '';
        $session ? $this->db->where("session", $session) : '';
        $course_code ? $this->db->where("course_code", $course_code) : '';
        $faculty_code ? $this->db->where("faculty_code", $faculty_code) : '';
        $batch_code ? $this->db->where("batch_code", $batch_code) : '';
        $room_id ? $this->db->where("room_id", $room_id) : '';
        if (!$date_from) {
            $date_from = date('Y-m-d');
        }
        if (!$date_to) {
            $date_to = get_changed_date('+1 week');
        }
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $this->db->order_by("date", 'ASC');
        $query = $this->db->get('sif_schedule');

        if ($query->num_rows() > 0) {
            $results = $query->result();

            if ($type == 'R') {
                $ret_data = array();
                foreach ($results as $i => $result) {
                    $ret_data[$result->date][] = $result;
                }
                $data['results'] = $ret_data;
            } elseif ($type == 'M') {
                $ret_data = array();
                foreach ($results as $i => $result) {
                    $ret_data[$result->schedule_name][$result->paper] = $result;
                }
                $data['results'] = $ret_data;
            } else {
                $data['results'] = $results;
            }

            return $data;
        }
        return FALSE;
    }

    function get_details($schedule_id)
    {
        $this->db->select('*');
        $this->db->where('id', $schedule_id);
        $query = $this->db->get('sif_schedule');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result;
        }
        return FALSE;
    }

    public function get_routine_name($type)
    {
        $name = 'view_schedule';

        switch ($type) {
            case 'R' :
                $name = 'view_schedule';
                break;
            case 'C' :
                $name = 'view_schedule_crush';
                break;
            case 'M' :
                $name = 'view_schedule_mock';
                break;
            case 'E' :
                $name = 'view_schedule_exam';
                break;
        }

        return $name;
    }


    public function get_schedules_data($teacher_id = null)
    {
        if ($this->input->post()) {
            $year = $this->input->post('year', true);
            $session = $this->input->post('session', true);
            $course_code = $this->input->post('course_code', true);
            $faculty_code = $this->input->post('faculty_code', true);
            $batch_code = $this->input->post('batch_code', true);
            $room_id = $this->input->post('room_id', true);
            $date_from = $this->input->post('date_from', true);
            $date_to = $this->input->post('date_to', true);
            $type = $this->input->post('type', true);

            $year ? $this->db->where("year", $year) : '';
            $session ? $this->db->where("session", $session) : '';
            $course_code ? $this->db->where("course_code", $course_code) : '';
            $faculty_code ? $this->db->where("faculty_code", $faculty_code) : '';
            $batch_code ? $this->db->where("batch_code", $batch_code) : '';
            $room_id ? $this->db->where("room_id", $room_id) : '';
            $type ? $this->db->where("schedule_type", $type) : '';
//            if (!$date_from) {
//                $date_from = date('Y-m-d');
//            }
//            if (!$date_to) {
//                $date_to = get_changed_date('+1 week');
//            }
            $date_from ? $this->db->where('date >=', $date_from) : '';
            $date_to ? $this->db->where('date <=', $date_to) : '';
        }
        if ($teacher_id) {
            $this->db->where('teacher_id', $teacher_id);
        }
        $this->db->order_by('date', 'ASC');
        $this->db->order_by('time_from', 'ASC');
        $query = $this->db->get('sif_schedule');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

}

