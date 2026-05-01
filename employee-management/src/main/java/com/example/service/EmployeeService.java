package com.example.service;

import java.util.ArrayList;
import java.util.List;

import com.example.model.Employee;
import org.springframework.stereotype.Component;

@Component
public class EmployeeService {
	 private List<Employee> employees = new ArrayList<>();

	    public void addEmployee(Employee emp) {
	        employees.add(emp);
	    }

	    public void displayEmployees() {
	        for (Employee e : employees) {
	            e.display();
	        }
	    }

}
