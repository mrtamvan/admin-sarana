<?php

class MAdmin extends CI_Model
{
  function logged_id()
  {
    if ($this->session->userdata("is_admin") == "1") {
      return $this->session->userdata("id");
      return $this->session->userdata("nama");
      return $this->session->userdata("email");
      return $this->session->userdata("is_admin");
    }
  }

  function get_participant()
  {
    return $this->db->get("cfs_participant")->result();
  }

  function get_donation()
  {
    $this->db->order_by("cfs_donate.id", "DESC");
    $this->db->select(
      "cfs_donate.*, cfs_campaign.id as campaign_id, cfs_campaign.id_id,cfs_campaigndetail.title"
    );
    $this->db->from("cfs_donate");
    $this->db->join("cfs_campaign", "cfs_campaign.id=cfs_donate.id_campaign");
    $this->db->join(
      "cfs_campaigndetail",
      "cfs_campaign.id_id=cfs_campaigndetail.id"
    );
    return $this->db->get()->result();
  }

  function get_campaigns()
  {
    $this->db->order_by("is_highlight", "DESC");
    $this->db->order_by("campaign_status", "ASC");
    $this->db->order_by("id", "DESC");
    $this->db->select(
      "cfs_campaign.id, id_en,id_id,target_fund, campaign_status, title, is_highlight"
    );
    $this->db->from("cfs_campaign");
    $this->db->join(
      "cfs_campaigndetail",
      "cfs_campaigndetail.id=cfs_campaign.id_en OR cfs_campaigndetail.id=cfs_campaign.id_id"
    );
    $this->db->group_by("cfs_campaign.id");
    return $this->db->get()->result();
  }

  function get_campaignparticipant($table, $where)
  {
    $this->db->select(
      "cfs_campaign.*,cfs_participant.nama,cfs_participant.email, COUNt(cfs_donate.id) as donatur, SUM(amount) as total_donate, cfs_campaigncategory.category_title"
    );
    $this->db->from($table);
    $this->db->where($where);
    $this->db->join(
      "cfs_participant",
      "cfs_participant.id=cfs_campaign.id_participant"
    );
    $this->db->join("cfs_donate", "cfs_donate.id_campaign=cfs_campaign.id");
    $this->db->join(
      "cfs_campaigncategory",
      "cfs_campaigncategory.id=cfs_campaign.id_category"
    );
    return $this->db->get();
  }

  function campaign_approve($id)
  {
    $admin_id = $this->session->userdata("id");
    $approve_date = date("Y-m-d");
    $end_campaign = date(
      "Y-m-d",
      strtotime("+3 month", strtotime($approve_date))
    );
    $data = [
      "campaign_status" => "2",
      "id_admin" => $admin_id,
      "approve_date" => $approve_date,
      "end_campaign" => $end_campaign,
    ];
    $where = ["id" => $id];
    $this->db->where($where);
    $this->db->update("cfs_campaign", $data);
  }

  function input_campaigndetail($slug)
  {
    $judul = $this->input->post("judul", true);
    $deskripsi = $this->input->post("deskripsi", true);

    $data = [
      "title" => $judul,
      "slug" => $slug,
      "description" => $deskripsi,
    ];
    $this->db->insert("cfs_campaigndetail", $data);
  }

  function update_campaign($id)
  {
    $id_campaign = $this->input->post("id", true);
    $bahasa = $this->input->post("bahasa", true);
    if ($bahasa == "") {
      $data = [
        "id_id" => $id,
      ];
      $where = ["id" => $id_campaign];
      $this->db->where($where);
      $this->db->update("cfs_campaign", $data);
    } else {
      $data = [
        "id_en" => $id,
      ];
      $where = ["id" => $id_campaign];
      $this->db->where($where);
      $this->db->update("cfs_campaign", $data);
    }
  }

  function unsethl()
  {
    $data = [
      "is_highlight" => "0",
    ];
    $where = ["is_highlight" => "1"];
    $this->db->where($where);
    $this->db->update("cfs_campaign", $data);
  }

  function sethl($id)
  {
    $data = [
      "is_highlight" => "1",
    ];
    $where = ["id" => $id];
    $this->db->where($where);
    $this->db->update("cfs_campaign", $data);
  }

  function input_message()
  {
    $subjek = $this->input->post("subjek", true);
    $pesan = $this->input->post("pesan", true);
    $id_admin = $this->session->userdata("id");
    $create_date = date("Y-m-d");

    $data = [
      "subjek" => $subjek,
      "message" => $pesan,
      "create_date" => $create_date,
      "id_admin" => $id_admin,
    ];

    $this->db->insert("cfs_message", $data);
  }

  function update_messagecampaign($id)
  {
    $id_campaign = $this->input->post("id", true);

    $data = [
      "id_message" => $id,
      "campaign_status" => "3",
    ];
    $where = ["id" => $id_campaign];
    $this->db->where($where);
    $this->db->update("cfs_campaign", $data);
  }

  function get_categories()
  {
    $this->db->order_by("id", "DESC");
    // $this->db->select("*");
    // $this->db->from("cfs_campaigncategory");
    return $this->db->get("cfs_campaigncategory")->result();
  }

  function input_category()
  {
    $nama = $this->input->post("nama", true);
    $description = $this->input->post("description", true);
    $id_admin = $this->session->userdata("id");
    $create_date = date("Y-m-d");

    $data = [
      "category_title" => $nama,
      "description" => $description,
      "create_date" => $create_date,
      "id_admin" => $id_admin,
      "is_active" => "1",
    ];

    $this->db->insert("cfs_campaigncategory", $data);
  }

  function get_unvepart()
  {
    $this->db->order_by("id", "DESC");
    $this->db->select("*");
    $this->db->from("cfs_participant");
    $this->db->where("status", "1");
    return $this->db->get()->result();
  }

  function regpart_count()
  {
    $this->db->select("id");
    $this->db->where("status", "1");
    $q = $this->db->get("cfs_participant");
    $count = $q->result();
    return count($count);
  }

  function get_waitpart()
  {
    $this->db->order_by("id", "DESC");
    $this->db->select("*");
    $this->db->from("cfs_participant");
    $this->db->where("status", "2");
    return $this->db->get()->result();
  }

  function waitpart_count()
  {
    $this->db->select("id");
    $this->db->where("status", "2");
    $q = $this->db->get("cfs_participant");
    $count = $q->result();
    return count($count);
  }

  function get_daniedpart()
  {
    $this->db->order_by("id", "DESC");
    $this->db->select("*");
    $this->db->from("cfs_participant");
    $this->db->where("status", "3");
    return $this->db->get()->result();
  }

  function daniedpart_count()
  {
    $this->db->select("id");
    $this->db->where("status", "3");
    $q = $this->db->get("cfs_participant");
    $count = $q->result();
    return count($count);
  }

  function get_activepart()
  {
    $this->db->order_by("id", "DESC");
    $this->db->select("*");
    $this->db->from("cfs_participant");
    $this->db->where("status", "4");
    return $this->db->get()->result();
  }

  function activepart_count()
  {
    $this->db->select("id");
    $this->db->where("status", "4");
    $q = $this->db->get("cfs_participant");
    $count = $q->result();
    return count($count);
  }

  function get_bannedpart()
  {
    $this->db->order_by("id", "DESC");
    $this->db->select("*");
    $this->db->from("cfs_participant");
    $this->db->where("status", "5");
    return $this->db->get()->result();
  }

  function bannedpart_count()
  {
    $this->db->select("id");
    $this->db->where("status", "5");
    $q = $this->db->get("cfs_participant");
    $count = $q->result();
    return count($count);
  }

  function get_where($table, $where)
  {
    return $this->db->get_where($table, $where);
  }

  function get_where_join($table, $where)
  {
    $this->db->select("cfs_campaign.id,cfs_campaign.id_id, title, description");
    $this->db->from($table);
    $this->db->where($where);
    $this->db->join(
      "cfs_campaign",
      "cfs_campaign.id_id=" .
        $table .
        ".id OR cfs_campaign.id_en=" .
        $table .
        ".id "
    );
    return $this->db->get();
  }

  function get_join($table, $where)
  {
    $this->db->from($table);
    $this->db->where($where);
    $this->db->join(
      "cfs_detailparticipant",
      "cfs_detailparticipant.nik=cfs_participant.nik"
    );
    return $this->db->get();
  }

  function approve($id)
  {
    $data = [
      "status" => "4",
    ];
    $where = ["id" => $id];
    $this->db->where($where);
    $this->db->update("cfs_participant", $data);
  }

  function banned($id)
  {
    $data = [
      "status" => "5",
    ];
    $where = ["id" => $id];
    $this->db->where($where);
    $this->db->update("cfs_participant", $data);
  }
} //end class
